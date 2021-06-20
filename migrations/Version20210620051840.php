<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210620051840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_conge DROP FOREIGN KEY FK_D8061061F49DCC2D');
        $this->addSql('DROP INDEX IDX_D8061061F49DCC2D ON demande_conge');
        $this->addSql('ALTER TABLE demande_conge CHANGE demandes_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_conge ADD CONSTRAINT FK_D8061061A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D8061061A76ED395 ON demande_conge (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_conge DROP FOREIGN KEY FK_D8061061A76ED395');
        $this->addSql('DROP INDEX IDX_D8061061A76ED395 ON demande_conge');
        $this->addSql('ALTER TABLE demande_conge CHANGE user_id demandes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_conge ADD CONSTRAINT FK_D8061061F49DCC2D FOREIGN KEY (demandes_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D8061061F49DCC2D ON demande_conge (demandes_id)');
    }
}
