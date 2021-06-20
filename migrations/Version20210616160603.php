<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616160603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees (id INT AUTO_INCREMENT NOT NULL, employees LONGTEXT NOT NULL, cin LONGTEXT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, grade LONGTEXT NOT NULL, departement LONGTEXT NOT NULL, tel LONGTEXT NOT NULL, adresse LONGTEXT NOT NULL, pass LONGTEXT NOT NULL, admin INT DEFAULT NULL, email LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE personnel');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande (ID INT NOT NULL, CIN VARCHAR(10) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, DateDepart DATE NOT NULL, DateRetour DATE NOT NULL, DateDemande DATE NOT NULL, Etat TINYINT(1) NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnel (cin VARCHAR(10) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, nom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, prenom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, grade VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, departement VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, tel VARCHAR(12) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, adresse TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, pass VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, admin INT NOT NULL, email TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE employees');
    }
}
