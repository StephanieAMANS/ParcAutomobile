<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220521142359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_type_car (car_id INT NOT NULL, type_car_id INT NOT NULL, INDEX IDX_FA1C3578C3C6F69F (car_id), INDEX IDX_FA1C3578E0119DA7 (type_car_id), PRIMARY KEY(car_id, type_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_site (car_id INT NOT NULL, site_id INT NOT NULL, INDEX IDX_A2291D48C3C6F69F (car_id), INDEX IDX_A2291D48F6BD1646 (site_id), PRIMARY KEY(car_id, site_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_car (reservation_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_223FCB42B83297E7 (reservation_id), INDEX IDX_223FCB42C3C6F69F (car_id), PRIMARY KEY(reservation_id, car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_site (reservation_id INT NOT NULL, site_id INT NOT NULL, INDEX IDX_7F7AC48CB83297E7 (reservation_id), INDEX IDX_7F7AC48CF6BD1646 (site_id), PRIMARY KEY(reservation_id, site_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_team (reservation_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_D2D96B77B83297E7 (reservation_id), INDEX IDX_D2D96B77296CD8AE (team_id), PRIMARY KEY(reservation_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_type_car (reservation_id INT NOT NULL, type_car_id INT NOT NULL, INDEX IDX_E89FE268B83297E7 (reservation_id), INDEX IDX_E89FE268E0119DA7 (type_car_id), PRIMARY KEY(reservation_id, type_car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_type_car ADD CONSTRAINT FK_FA1C3578C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_type_car ADD CONSTRAINT FK_FA1C3578E0119DA7 FOREIGN KEY (type_car_id) REFERENCES type_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_site ADD CONSTRAINT FK_A2291D48C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_site ADD CONSTRAINT FK_A2291D48F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_car ADD CONSTRAINT FK_223FCB42B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_car ADD CONSTRAINT FK_223FCB42C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_site ADD CONSTRAINT FK_7F7AC48CB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_site ADD CONSTRAINT FK_7F7AC48CF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_team ADD CONSTRAINT FK_D2D96B77B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_team ADD CONSTRAINT FK_D2D96B77296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_type_car ADD CONSTRAINT FK_E89FE268B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_type_car ADD CONSTRAINT FK_E89FE268E0119DA7 FOREIGN KEY (type_car_id) REFERENCES type_car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car ADD personel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA8C3AF89 FOREIGN KEY (personel_id) REFERENCES personel (id)');
        $this->addSql('CREATE INDEX IDX_773DE69DA8C3AF89 ON car (personel_id)');
        $this->addSql('ALTER TABLE personel ADD code_team INT DEFAULT NULL, ADD code_site INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD personel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A8C3AF89 FOREIGN KEY (personel_id) REFERENCES personel (id)');
        $this->addSql('CREATE INDEX IDX_42C84955A8C3AF89 ON reservation (personel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE car_type_car');
        $this->addSql('DROP TABLE car_site');
        $this->addSql('DROP TABLE reservation_car');
        $this->addSql('DROP TABLE reservation_site');
        $this->addSql('DROP TABLE reservation_team');
        $this->addSql('DROP TABLE reservation_type_car');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA8C3AF89');
        $this->addSql('DROP INDEX IDX_773DE69DA8C3AF89 ON car');
        $this->addSql('ALTER TABLE car DROP personel_id');
        $this->addSql('ALTER TABLE personel DROP code_team, DROP code_site');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A8C3AF89');
        $this->addSql('DROP INDEX IDX_42C84955A8C3AF89 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP personel_id');
    }
}
