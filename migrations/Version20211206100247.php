<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211206100247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sets_category (sets_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_25BB1A35F40DDE7E (sets_id), INDEX IDX_25BB1A3512469DE2 (category_id), PRIMARY KEY(sets_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sets_category ADD CONSTRAINT FK_25BB1A35F40DDE7E FOREIGN KEY (sets_id) REFERENCES sets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sets_category ADD CONSTRAINT FK_25BB1A3512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sets_category');
    }
}
