<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220521140444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, matriculation VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) DEFAULT NULL, kilometers INT DEFAULT NULL, kilometers_max INT DEFAULT NULL, rental_start_date DATE DEFAULT NULL, estimated_rental_end_date DATE DEFAULT NULL, reel_rental_end_date DATE DEFAULT NULL, majdate DATE DEFAULT NULL, comments VARCHAR(255) DEFAULT NULL, localisation VARCHAR(255) DEFAULT NULL, monthly_cost INT DEFAULT NULL, fuel_card VARCHAR(100) DEFAULT NULL, toll_card VARCHAR(100) DEFAULT NULL, fiscal_power INT DEFAULT NULL, co2_emission INT DEFAULT NULL, gps VARCHAR(100) DEFAULT NULL, regulator VARCHAR(100) DEFAULT NULL, is_reserved TINYINT(1) DEFAULT NULL, is_available TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, demand VARCHAR(255) NOT NULL, is_demand_valid TINYINT(1) NOT NULL, operation_code VARCHAR(100) DEFAULT NULL, departure_date DATE NOT NULL, departure_time TIME NOT NULL, return_date DATE NOT NULL, return_time TIME NOT NULL, comments VARCHAR(255) DEFAULT NULL, applicant_mail VARCHAR(255) NOT NULL, chief_mail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_car (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE type_car');
    }
}
