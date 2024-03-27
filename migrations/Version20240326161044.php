<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326161044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles INT NOT NULL, nom VARCHAR(55) NOT NULL, prenom VARCHAR(55) NOT NULL, telephone VARCHAR(11) DEFAULT NULL, datenaissance DATE DEFAULT NULL, nbenfants INT NOT NULL, code VARCHAR(11) NOT NULL, password VARCHAR(35) NOT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clientsports (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, listesports_id INT DEFAULT NULL, INDEX IDX_5A9C893719EB6921 (client_id), INDEX IDX_5A9C893766A6A12D (listesports_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, date DATE NOT NULL, prixtotal DOUBLE PRECISION NOT NULL, etat VARCHAR(55) NOT NULL, INDEX IDX_35D4282C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfants (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, age INT NOT NULL, INDEX IDX_23E2BAC319EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrepot (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(125) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieudisponibilite (id INT AUTO_INCREMENT NOT NULL, magasin_id INT NOT NULL, produit_id INT DEFAULT NULL, quantite INT DEFAULT NULL, rayon VARCHAR(100) DEFAULT NULL, INDEX IDX_F793E35620096AE3 (magasin_id), INDEX IDX_F793E356F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieuentrepot (id INT AUTO_INCREMENT NOT NULL, entrepot_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quantite INT NOT NULL, etagere VARCHAR(55) NOT NULL, etage INT DEFAULT NULL, INDEX IDX_4DC9CEC672831E97 (entrepot_id), INDEX IDX_4DC9CEC6F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listesports (id INT AUTO_INCREMENT NOT NULL, sport VARCHAR(55) NOT NULL, photos VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE magasin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(125) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, commande_id INT DEFAULT NULL, état INT NOT NULL, quantite INT NOT NULL, INDEX IDX_24CC0DF2F347EFB (produit_id), INDEX IDX_24CC0DF282EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photosproduit (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, photos VARCHAR(100) DEFAULT NULL, INDEX IDX_B29C8CB3F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, sport_id INT NOT NULL, nom VARCHAR(100) NOT NULL, prix DOUBLE PRECISION NOT NULL, description VARCHAR(255) DEFAULT NULL, reference VARCHAR(55) NOT NULL, fournisseur VARCHAR(55) DEFAULT NULL, INDEX IDX_29A5EC27AC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clientsports ADD CONSTRAINT FK_5A9C893719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE clientsports ADD CONSTRAINT FK_5A9C893766A6A12D FOREIGN KEY (listesports_id) REFERENCES listesports (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE enfants ADD CONSTRAINT FK_23E2BAC319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E35620096AE3 FOREIGN KEY (magasin_id) REFERENCES magasin (id)');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lieuentrepot ADD CONSTRAINT FK_4DC9CEC672831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('ALTER TABLE lieuentrepot ADD CONSTRAINT FK_4DC9CEC6F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF282EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE photosproduit ADD CONSTRAINT FK_B29C8CB3F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27AC78BCF8 FOREIGN KEY (sport_id) REFERENCES listesports (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clientsports DROP FOREIGN KEY FK_5A9C893719EB6921');
        $this->addSql('ALTER TABLE clientsports DROP FOREIGN KEY FK_5A9C893766A6A12D');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C19EB6921');
        $this->addSql('ALTER TABLE enfants DROP FOREIGN KEY FK_23E2BAC319EB6921');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E35620096AE3');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356F347EFB');
        $this->addSql('ALTER TABLE lieuentrepot DROP FOREIGN KEY FK_4DC9CEC672831E97');
        $this->addSql('ALTER TABLE lieuentrepot DROP FOREIGN KEY FK_4DC9CEC6F347EFB');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F347EFB');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF282EA2E54');
        $this->addSql('ALTER TABLE photosproduit DROP FOREIGN KEY FK_B29C8CB3F347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27AC78BCF8');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE clientsports');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('DROP TABLE entrepot');
        $this->addSql('DROP TABLE lieudisponibilite');
        $this->addSql('DROP TABLE lieuentrepot');
        $this->addSql('DROP TABLE listesports');
        $this->addSql('DROP TABLE magasin');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE photosproduit');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
