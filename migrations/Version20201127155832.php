<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201127155832 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(60) NOT NULL, phone INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, address VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, totalprice INT NOT NULL, datedebut DATE NOT NULL, dateretrait DATE NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mesure_homme (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, epaule DOUBLE PRECISION DEFAULT NULL, mass_courte DOUBLE PRECISION DEFAULT NULL, mass_long DOUBLE PRECISION DEFAULT NULL, mass_troiscart DOUBLE PRECISION DEFAULT NULL, tourede_mass DOUBLE PRECISION DEFAULT NULL, poigner DOUBLE PRECISION DEFAULT NULL, coup DOUBLE PRECISION DEFAULT NULL, poitrine DOUBLE PRECISION NOT NULL, longboubou DOUBLE PRECISION DEFAULT NULL, demi_saison DOUBLE PRECISION DEFAULT NULL, trois_cart DOUBLE PRECISION DEFAULT NULL, ceinture DOUBLE PRECISION NOT NULL, longueur_pantalon DOUBLE PRECISION DEFAULT NULL, cuisse DOUBLE PRECISION DEFAULT NULL, anche DOUBLE PRECISION DEFAULT NULL, INDEX IDX_E64165E819EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, nom VARCHAR(200) NOT NULL, description LONGTEXT DEFAULT NULL, photo VARCHAR(255) NOT NULL, prix INT DEFAULT NULL, INDEX IDX_1002855882EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE mesure_homme ADD CONSTRAINT FK_E64165E819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_1002855882EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE mesure_homme DROP FOREIGN KEY FK_E64165E819EB6921');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_1002855882EA2E54');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE mesure_homme');
        $this->addSql('DROP TABLE modele');
    }
}
