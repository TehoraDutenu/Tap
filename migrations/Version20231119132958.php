<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231119132958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_domaine (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_domaine_domaine (activite_domaine_id INT NOT NULL, domaine_id INT NOT NULL, INDEX IDX_6B1176121E8262EA (activite_domaine_id), INDEX IDX_6B1176124272FC9F (domaine_id), PRIMARY KEY(activite_domaine_id, domaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_domaine_activite (activite_domaine_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_D90D14BA1E8262EA (activite_domaine_id), INDEX IDX_D90D14BA9B0F88B1 (activite_id), PRIMARY KEY(activite_domaine_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, address VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(20) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, is_online TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE production (id INT AUTO_INCREMENT NOT NULL, domaine_id INT NOT NULL, is_all_bio TINYINT(1) NOT NULL, have_bio TINYINT(1) NOT NULL, have_sulfite TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_D3EDB1E04272FC9F (domaine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE representant (id INT AUTO_INCREMENT NOT NULL, domaine_id INT NOT NULL, firstname VARCHAR(50) NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(150) NOT NULL, phone VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_80D5DBC94272FC9F (domaine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite_domaine_domaine ADD CONSTRAINT FK_6B1176121E8262EA FOREIGN KEY (activite_domaine_id) REFERENCES activite_domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_domaine_domaine ADD CONSTRAINT FK_6B1176124272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_domaine_activite ADD CONSTRAINT FK_D90D14BA1E8262EA FOREIGN KEY (activite_domaine_id) REFERENCES activite_domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_domaine_activite ADD CONSTRAINT FK_D90D14BA9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE production ADD CONSTRAINT FK_D3EDB1E04272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
        $this->addSql('ALTER TABLE representant ADD CONSTRAINT FK_80D5DBC94272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_domaine_domaine DROP FOREIGN KEY FK_6B1176121E8262EA');
        $this->addSql('ALTER TABLE activite_domaine_domaine DROP FOREIGN KEY FK_6B1176124272FC9F');
        $this->addSql('ALTER TABLE activite_domaine_activite DROP FOREIGN KEY FK_D90D14BA1E8262EA');
        $this->addSql('ALTER TABLE activite_domaine_activite DROP FOREIGN KEY FK_D90D14BA9B0F88B1');
        $this->addSql('ALTER TABLE production DROP FOREIGN KEY FK_D3EDB1E04272FC9F');
        $this->addSql('ALTER TABLE representant DROP FOREIGN KEY FK_80D5DBC94272FC9F');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_domaine');
        $this->addSql('DROP TABLE activite_domaine_domaine');
        $this->addSql('DROP TABLE activite_domaine_activite');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE production');
        $this->addSql('DROP TABLE representant');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
