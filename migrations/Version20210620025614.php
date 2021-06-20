<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210620025614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_conge DROP FOREIGN KEY FK_D80610618C03F15C');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP INDEX IDX_D80610618C03F15C ON demande_conge');
        $this->addSql('ALTER TABLE demande_conge DROP employee_id');
        $this->addSql('ALTER TABLE user ADD grade LONGTEXT DEFAULT NULL, ADD departement LONGTEXT DEFAULT NULL, ADD tel LONGTEXT DEFAULT NULL, ADD adresse LONGTEXT DEFAULT NULL, ADD salaire INT DEFAULT NULL, ADD cin LONGTEXT DEFAULT NULL, ADD date_embauche DATE DEFAULT NULL, ADD date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees (id INT AUTO_INCREMENT NOT NULL, grade LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, departement LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tel LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, salaire LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cin LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_embauche DATE NOT NULL, date_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE demande_conge ADD employee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_conge ADD CONSTRAINT FK_D80610618C03F15C FOREIGN KEY (employee_id) REFERENCES employees (id)');
        $this->addSql('CREATE INDEX IDX_D80610618C03F15C ON demande_conge (employee_id)');
        $this->addSql('ALTER TABLE user DROP grade, DROP departement, DROP tel, DROP adresse, DROP salaire, DROP cin, DROP date_embauche, DROP date_naissance');
    }
}
