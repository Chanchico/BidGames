<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\City;
use App\Entity\Department;
use App\Form\Type\CityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractApiController
{

    #[Route('/cities', name: 'cities', methods: 'GET')]
    public function showAction(Request $request): Response
    {
        $departmentID = $request->get('id');

        $department = $this->getDoctrine()->getRepository(City::class)->findOneBy(['id' => $departmentID]);

        if (!$department) {
            throw new NotFoundHttpException('Department not found');
        }

        $city = $this->getDoctrine()->getRepository(City::class)->findOneBy([
            'department' => $department,
        ]);

        if (!$city) {
            throw new NotFoundHttpException('City does not exist for this department');
        }

        return $this->respond($department);
    }

    #[Route('/cities', name: 'cities', methods: 'POST')]
    public function createAction(Request $request): Response
    {
        $form = $this->buildForm(CityType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var City $city */
        $city = $form->getData();

        $this->getDoctrine()->getManager()->persist($city);
        $this->getDoctrine()->getManager()->flush();

        return $this->respond($city);
    }

    #[Route('/cities', name: 'cities', methods: 'PUT')]
    public function updateAction(Request $request): Response
    {
        $departmentId = $request->get('departmentID');

        $department = $this->getDoctrine()->getRepository(Department::class)->findOneBy(['id' => $departmentId]);

        if (!$department) {
            throw new NotFoundHttpException('Customer not found');
        }

        $city = $this->getDoctrine()->getRepository(City::class)->findOneBy([
            'department' => $department,
        ]);

        $form = $this->buildForm(CityType::class, $city, [
            'method' => $request->getMethod(),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }

        /** @var City $city */
        $city = $form->getData();

        $this->getDoctrine()->getManager()->persist($city);
        $this->getDoctrine()->getManager()->flush();
        return $this->respond($city);
    }

    #[Route('/cities', name: 'cities', methods: 'DELETE')]
    public function deleteAction(Request $request): Response
    {
        $cityId = $request->get('cityId');
        $departmentId = $request->get('departmentIdId');

        $city = $this->getDoctrine()->getRepository(City::class)->findOneBy([
            'department' => $departmentId,
            'id' => $cityId,
        ]);

        if (!$city) {
            throw new NotFoundHttpException('City not found');
        }

        $this->getDoctrine()->getManager()->remove($city);
        $this->getDoctrine()->getManager()->flush();

        return $this->respond(null);
    }
}