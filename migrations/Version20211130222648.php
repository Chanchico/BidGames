<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130222648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointement (id INT AUTO_INCREMENT NOT NULL, id_user_auctioneer_id INT NOT NULL, id_user_seller_id INT NOT NULL, id_appointement INT NOT NULL, date_appointement DATETIME NOT NULL, address VARCHAR(255) NOT NULL, cost NUMERIC(15, 2) NOT NULL, UNIQUE INDEX UNIQ_BD9991CD489FD928 (id_user_auctioneer_id), UNIQUE INDEX UNIQ_BD9991CDB06E103B (id_user_seller_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bid (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_bid INT NOT NULL, bet NUMERIC(15, 2) NOT NULL, INDEX IDX_4AF2B3F379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE buying_order (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_buyorder INT NOT NULL, max_bid NUMERIC(15, 2) NOT NULL, INDEX IDX_8FF64DA179F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, id_category INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, id_departement_id INT NOT NULL, id_city INT NOT NULL, name VARCHAR(255) NOT NULL, code INT NOT NULL, INDEX IDX_2D5B0234F19F5D18 (id_departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, id_region_id INT NOT NULL, id_departement INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C1765B631813BD72 (id_region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_sets_id INT NOT NULL, id_type_id INT NOT NULL, buying_order_id INT NOT NULL, bid_id INT NOT NULL, id_product INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, state VARCHAR(255) NOT NULL, estimate_price NUMERIC(15, 2) NOT NULL, reserve_price NUMERIC(15, 2) NOT NULL, INDEX IDX_D34A04AD79F37AE5 (id_user_id), INDEX IDX_D34A04AD2A90770E (id_sets_id), INDEX IDX_D34A04AD1BD125E3 (id_type_id), INDEX IDX_D34A04ADAFF29489 (buying_order_id), INDEX IDX_D34A04AD4D9866B8 (bid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, id_region INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sets (id INT AUTO_INCREMENT NOT NULL, id_city_id INT NOT NULL, id_category_id INT NOT NULL, id_user_auctioneer_id INT NOT NULL, id_sets INT NOT NULL, launch_date DATETIME DEFAULT NULL, is_published TINYINT(1) NOT NULL, address VARCHAR(255) NOT NULL, INDEX IDX_948D45D15531CBDF (id_city_id), INDEX IDX_948D45D1A545015 (id_category_id), INDEX IDX_948D45D1489FD928 (id_user_auctioneer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, id_type INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, id_city_id INT NOT NULL, id_user INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, mail VARCHAR(255) NOT NULL, licence INT DEFAULT NULL, INDEX IDX_1483A5E95531CBDF (id_city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE verify (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_verify INT NOT NULL, verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A1252A4379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CD489FD928 FOREIGN KEY (id_user_auctioneer_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CDB06E103B FOREIGN KEY (id_user_seller_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE bid ADD CONSTRAINT FK_4AF2B3F379F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE buying_order ADD CONSTRAINT FK_8FF64DA179F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F19F5D18 FOREIGN KEY (id_departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B631813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2A90770E FOREIGN KEY (id_sets_id) REFERENCES sets (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD1BD125E3 FOREIGN KEY (id_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADAFF29489 FOREIGN KEY (buying_order_id) REFERENCES buying_order (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4D9866B8 FOREIGN KEY (bid_id) REFERENCES bid (id)');
        $this->addSql('ALTER TABLE sets ADD CONSTRAINT FK_948D45D15531CBDF FOREIGN KEY (id_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE sets ADD CONSTRAINT FK_948D45D1A545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE sets ADD CONSTRAINT FK_948D45D1489FD928 FOREIGN KEY (id_user_auctioneer_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E95531CBDF FOREIGN KEY (id_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE verify ADD CONSTRAINT FK_A1252A4379F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4D9866B8');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADAFF29489');
        $this->addSql('ALTER TABLE sets DROP FOREIGN KEY FK_948D45D1A545015');
        $this->addSql('ALTER TABLE sets DROP FOREIGN KEY FK_948D45D15531CBDF');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E95531CBDF');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F19F5D18');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B631813BD72');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2A90770E');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD1BD125E3');
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CD489FD928');
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CDB06E103B');
        $this->addSql('ALTER TABLE bid DROP FOREIGN KEY FK_4AF2B3F379F37AE5');
        $this->addSql('ALTER TABLE buying_order DROP FOREIGN KEY FK_8FF64DA179F37AE5');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD79F37AE5');
        $this->addSql('ALTER TABLE sets DROP FOREIGN KEY FK_948D45D1489FD928');
        $this->addSql('ALTER TABLE verify DROP FOREIGN KEY FK_A1252A4379F37AE5');
        $this->addSql('DROP TABLE appointement');
        $this->addSql('DROP TABLE bid');
        $this->addSql('DROP TABLE buying_order');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE sets');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE verify');
    }
}
