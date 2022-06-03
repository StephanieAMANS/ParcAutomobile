<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603080754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, personel_id INT DEFAULT NULL, matriculation VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) DEFAULT NULL, kilometers INT DEFAULT NULL, kilometers_max INT DEFAULT NULL, rental_start_date DATE DEFAULT NULL, estimated_rental_end_date DATE DEFAULT NULL, reel_rental_end_date DATE DEFAULT NULL, majdate DATE DEFAULT NULL, comments VARCHAR(255) DEFAULT NULL, localisation VARCHAR(255) DEFAULT NULL, monthly_cost INT DEFAULT NULL, fuel_card VARCHAR(100) DEFAULT NULL, toll_card VARCHAR(100) DEFAULT NULL, fiscal_power INT DEFAULT NULL, co2_emission INT DEFAULT NULL, gps VARCHAR(100) DEFAULT NULL, regulator VARCHAR(100) DEFAULT NULL, is_available TINYINT(1) DEFAULT NULL, INDEX IDX_773DE69DA8C3AF89 (personel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_type_car (car_id INT NOT NULL, type_car_id INT NOT NULL, INDEX IDX_FA1C3578C3C6F69F (car_id), INDEX IDX_FA1C3578E0119DA7 (type_car_id), PRIMARY KEY(car_id, type_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_site (car_id INT NOT NULL, site_id INT NOT NULL, INDEX IDX_A2291D48C3C6F69F (car_id), INDEX IDX_A2291D48F6BD1646 (site_id), PRIMARY KEY(car_id, site_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_team (car_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_F8AB2B3C3C6F69F (car_id), INDEX IDX_F8AB2B3296CD8AE (team_id), PRIMARY KEY(car_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personel (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, team_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, employee_manager VARCHAR(100) DEFAULT NULL, mail_employee_manager VARCHAR(100) DEFAULT NULL, matricule INT NOT NULL, phone VARCHAR(100) DEFAULT NULL, portable VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_95E6A880F85E0677 (username), INDEX IDX_95E6A880F6BD1646 (site_id), INDEX IDX_95E6A880296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, personel_id INT NOT NULL, demand VARCHAR(255) NOT NULL, number_om INT DEFAULT NULL, operation_code VARCHAR(100) DEFAULT NULL, departure_date DATE NOT NULL, departure_time TIME NOT NULL, return_date DATE NOT NULL, return_time TIME NOT NULL, comments VARCHAR(255) DEFAULT NULL, trip VARCHAR(100) DEFAULT NULL, winter_equipment VARCHAR(100) DEFAULT NULL, departure_counter_kilometers INT DEFAULT NULL, return_counter_kilometers INT DEFAULT NULL, estimated_kilometers INT DEFAULT NULL, traveled_kilometers INT DEFAULT NULL, actual_return_date INT DEFAULT NULL, date_maj INT DEFAULT NULL, return_comments VARCHAR(255) DEFAULT NULL, INDEX IDX_42C84955A8C3AF89 (personel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_car (reservation_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_223FCB42B83297E7 (reservation_id), INDEX IDX_223FCB42C3C6F69F (car_id), PRIMARY KEY(reservation_id, car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_site (reservation_id INT NOT NULL, site_id INT NOT NULL, INDEX IDX_7F7AC48CB83297E7 (reservation_id), INDEX IDX_7F7AC48CF6BD1646 (site_id), PRIMARY KEY(reservation_id, site_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_team (reservation_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_D2D96B77B83297E7 (reservation_id), INDEX IDX_D2D96B77296CD8AE (team_id), PRIMARY KEY(reservation_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_type_car (reservation_id INT NOT NULL, type_car_id INT NOT NULL, INDEX IDX_E89FE268B83297E7 (reservation_id), INDEX IDX_E89FE268E0119DA7 (type_car_id), PRIMARY KEY(reservation_id, type_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_car (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA8C3AF89 FOREIGN KEY (personel_id) REFERENCES personel (id)');
        $this->addSql('ALTER TABLE car_type_car ADD CONSTRAINT FK_FA1C3578C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_type_car ADD CONSTRAINT FK_FA1C3578E0119DA7 FOREIGN KEY (type_car_id) REFERENCES type_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_site ADD CONSTRAINT FK_A2291D48C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_site ADD CONSTRAINT FK_A2291D48F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_team ADD CONSTRAINT FK_F8AB2B3C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_team ADD CONSTRAINT FK_F8AB2B3296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personel ADD CONSTRAINT FK_95E6A880F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE personel ADD CONSTRAINT FK_95E6A880296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A8C3AF89 FOREIGN KEY (personel_id) REFERENCES personel (id)');
        $this->addSql('ALTER TABLE reservation_car ADD CONSTRAINT FK_223FCB42B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_car ADD CONSTRAINT FK_223FCB42C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_site ADD CONSTRAINT FK_7F7AC48CB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_site ADD CONSTRAINT FK_7F7AC48CF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_team ADD CONSTRAINT FK_D2D96B77B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_team ADD CONSTRAINT FK_D2D96B77296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_type_car ADD CONSTRAINT FK_E89FE268B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_type_car ADD CONSTRAINT FK_E89FE268E0119DA7 FOREIGN KEY (type_car_id) REFERENCES type_car (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_type_car DROP FOREIGN KEY FK_FA1C3578C3C6F69F');
        $this->addSql('ALTER TABLE car_site DROP FOREIGN KEY FK_A2291D48C3C6F69F');
        $this->addSql('ALTER TABLE car_team DROP FOREIGN KEY FK_F8AB2B3C3C6F69F');
        $this->addSql('ALTER TABLE reservation_car DROP FOREIGN KEY FK_223FCB42C3C6F69F');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA8C3AF89');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A8C3AF89');
        $this->addSql('ALTER TABLE reservation_car DROP FOREIGN KEY FK_223FCB42B83297E7');
        $this->addSql('ALTER TABLE reservation_site DROP FOREIGN KEY FK_7F7AC48CB83297E7');
        $this->addSql('ALTER TABLE reservation_team DROP FOREIGN KEY FK_D2D96B77B83297E7');
        $this->addSql('ALTER TABLE reservation_type_car DROP FOREIGN KEY FK_E89FE268B83297E7');
        $this->addSql('ALTER TABLE car_site DROP FOREIGN KEY FK_A2291D48F6BD1646');
        $this->addSql('ALTER TABLE personel DROP FOREIGN KEY FK_95E6A880F6BD1646');
        $this->addSql('ALTER TABLE reservation_site DROP FOREIGN KEY FK_7F7AC48CF6BD1646');
        $this->addSql('ALTER TABLE car_team DROP FOREIGN KEY FK_F8AB2B3296CD8AE');
        $this->addSql('ALTER TABLE personel DROP FOREIGN KEY FK_95E6A880296CD8AE');
        $this->addSql('ALTER TABLE reservation_team DROP FOREIGN KEY FK_D2D96B77296CD8AE');
        $this->addSql('ALTER TABLE car_type_car DROP FOREIGN KEY FK_FA1C3578E0119DA7');
        $this->addSql('ALTER TABLE reservation_type_car DROP FOREIGN KEY FK_E89FE268E0119DA7');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_type_car');
        $this->addSql('DROP TABLE car_site');
        $this->addSql('DROP TABLE car_team');
        $this->addSql('DROP TABLE personel');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_car');
        $this->addSql('DROP TABLE reservation_site');
        $this->addSql('DROP TABLE reservation_team');
        $this->addSql('DROP TABLE reservation_type_car');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE type_car');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
