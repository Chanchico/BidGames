<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211203212613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_city_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, address LONGTEXT NOT NULL, licence INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6495531CBDF (id_city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495531CBDF FOREIGN KEY (id_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CD489FD928');
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CDB06E103B');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CD489FD928 FOREIGN KEY (id_user_auctioneer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CDB06E103B FOREIGN KEY (id_user_seller_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bid DROP FOREIGN KEY FK_4AF2B3F379F37AE5');
        $this->addSql('ALTER TABLE bid ADD CONSTRAINT FK_4AF2B3F379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE buying_order DROP FOREIGN KEY FK_8FF64DA179F37AE5');
        $this->addSql('ALTER TABLE buying_order ADD CONSTRAINT FK_8FF64DA179F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD79F37AE5');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sets DROP FOREIGN KEY FK_948D45D1489FD928');
        $this->addSql('ALTER TABLE sets ADD CONSTRAINT FK_948D45D1489FD928 FOREIGN KEY (id_user_auctioneer_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CD489FD928');
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CDB06E103B');
        $this->addSql('ALTER TABLE bid DROP FOREIGN KEY FK_4AF2B3F379F37AE5');
        $this->addSql('ALTER TABLE buying_order DROP FOREIGN KEY FK_8FF64DA179F37AE5');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD79F37AE5');
        $this->addSql('ALTER TABLE sets DROP FOREIGN KEY FK_948D45D1489FD928');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CD489FD928');
        $this->addSql('ALTER TABLE appointement DROP FOREIGN KEY FK_BD9991CDB06E103B');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CD489FD928 FOREIGN KEY (id_user_auctioneer_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE appointement ADD CONSTRAINT FK_BD9991CDB06E103B FOREIGN KEY (id_user_seller_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE bid DROP FOREIGN KEY FK_4AF2B3F379F37AE5');
        $this->addSql('ALTER TABLE bid ADD CONSTRAINT FK_4AF2B3F379F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE buying_order DROP FOREIGN KEY FK_8FF64DA179F37AE5');
        $this->addSql('ALTER TABLE buying_order ADD CONSTRAINT FK_8FF64DA179F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD79F37AE5');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sets DROP FOREIGN KEY FK_948D45D1489FD928');
        $this->addSql('ALTER TABLE sets ADD CONSTRAINT FK_948D45D1489FD928 FOREIGN KEY (id_user_auctioneer_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
