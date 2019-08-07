<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716165907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE henkilo (id INT AUTO_INCREMENT NOT NULL, etunimi VARCHAR(30) NOT NULL, sukunimi VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kuntopiste (id INT AUTO_INCREMENT NOT NULL, nimi VARCHAR(50) NOT NULL, hiihtokilometrit INT NOT NULL, juoksukilometrit INT NOT NULL, kavelykilometrit INT NOT NULL, kuntopisteet INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lampotila (id INT AUTO_INCREMENT NOT NULL, ma VARCHAR(5) NOT NULL, ti VARCHAR(5) NOT NULL, ke VARCHAR(5) NOT NULL, torstai VARCHAR(5) NOT NULL, perjantai VARCHAR(5) NOT NULL, lauantai VARCHAR(5) NOT NULL, sunnuntai VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE osasto (id INT AUTO_INCREMENT NOT NULL, nimi VARCHAR(64) NOT NULL, osasto_idp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE henkilo');
        $this->addSql('DROP TABLE kuntopiste');
        $this->addSql('DROP TABLE lampotila');
        $this->addSql('DROP TABLE osasto');
    }
}
