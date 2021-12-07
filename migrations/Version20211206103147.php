<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211206103147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sets ADD id_bid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sets ADD CONSTRAINT FK_948D45D16BAFD355 FOREIGN KEY (id_bid_id) REFERENCES bid (id)');
        $this->addSql('CREATE INDEX IDX_948D45D16BAFD355 ON sets (id_bid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sets DROP FOREIGN KEY FK_948D45D16BAFD355');
        $this->addSql('DROP INDEX IDX_948D45D16BAFD355 ON sets');
        $this->addSql('ALTER TABLE sets DROP id_bid_id');
    }
}
