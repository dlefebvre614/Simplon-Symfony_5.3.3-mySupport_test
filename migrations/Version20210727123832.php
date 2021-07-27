<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210727123832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorypost (id INT AUTO_INCREMENT NOT NULL, parentpost_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(120) NOT NULL, INDEX IDX_3223D82DFDA92769 (parentpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorypost ADD CONSTRAINT FK_3223D82DFDA92769 FOREIGN KEY (parentpost_id) REFERENCES categorypost (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorypost DROP FOREIGN KEY FK_3223D82DFDA92769');
        $this->addSql('DROP TABLE categorypost');
    }
}
