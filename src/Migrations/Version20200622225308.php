<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200622225308 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteur (id_auteur INT AUTO_INCREMENT NOT NULL, nom_prenom VARCHAR(50) NOT NULL, date_naiss DATE DEFAULT NULL, nationalite VARCHAR(50) NOT NULL, description VARCHAR(4096) DEFAULT \'NULL\', photo VARCHAR(255) DEFAULT \'NULL\', PRIMARY KEY(id_auteur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt_retour (id_emprunt_retour INT AUTO_INCREMENT NOT NULL, livre_id INT DEFAULT NULL, etudiant_id CHAR(8) DEFAULT NULL, date_emprunt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, date_retour DATETIME DEFAULT NULL, etat_retour VARCHAR(1) NOT NULL, INDEX FK_EMPRUNT__APP04_LIVRE (livre_id), INDEX FK_EMPRUNT__APP05_ETUDIANT (etudiant_id), PRIMARY KEY(id_emprunt_retour)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (cin CHAR(8) NOT NULL, nom_prenom VARCHAR(50) NOT NULL, num_carte VARCHAR(20) DEFAULT \'NULL\', date_naiss DATE DEFAULT NULL, email VARCHAR(100) DEFAULT \'NULL\', tel VARCHAR(20) DEFAULT \'NULL\', photo VARCHAR(255) DEFAULT \'NULL\', PRIMARY KEY(cin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id_livre INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, maison_edt_id INT DEFAULT NULL, theme_id INT DEFAULT NULL, titre VARCHAR(50) NOT NULL, nbre_pages SMALLINT NOT NULL, prix BIGINT DEFAULT NULL, date_achat DATE DEFAULT NULL, disponible TINYINT(1) DEFAULT \'1\' NOT NULL, couverture VARCHAR(255) DEFAULT \'NULL\', lien_telechargement VARCHAR(255) DEFAULT \'NULL\', nbre_telechargement BIGINT NOT NULL, etat_livre VARCHAR(1) NOT NULL, INDEX FK_LIVRE_APP01_AUTEUR (auteur_id), INDEX FK_LIVRE_APP02_MAISON_E (maison_edt_id), INDEX FK_LIVRE_APP03_THEME (theme_id), PRIMARY KEY(id_livre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mot_cle_livre (livre_id INT NOT NULL, mot_cle_id INT NOT NULL, INDEX IDX_B6349A1E37D925CB (livre_id), INDEX IDX_B6349A1EFE94535C (mot_cle_id), PRIMARY KEY(livre_id, mot_cle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maison_edt (id_maison_edt INT AUTO_INCREMENT NOT NULL, design_maison_edt VARCHAR(50) NOT NULL, adresse VARCHAR(255) DEFAULT \'NULL\', email VARCHAR(100) DEFAULT \'NULL\', site_web VARCHAR(100) DEFAULT \'NULL\', PRIMARY KEY(id_maison_edt)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mot_cle (id_mot_cle INT AUTO_INCREMENT NOT NULL, design_mot_cle VARCHAR(50) NOT NULL, PRIMARY KEY(id_mot_cle)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id_theme INT AUTO_INCREMENT NOT NULL, design_theme VARCHAR(50) NOT NULL, PRIMARY KEY(id_theme)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emprunt_retour ADD CONSTRAINT FK_37F5283937D925CB FOREIGN KEY (livre_id) REFERENCES livre (id_livre)');
        $this->addSql('ALTER TABLE emprunt_retour ADD CONSTRAINT FK_37F52839DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (cin)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id_auteur)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99194B4BCC FOREIGN KEY (maison_edt_id) REFERENCES maison_edt (id_maison_edt)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9959027487 FOREIGN KEY (theme_id) REFERENCES theme (id_theme)');
        $this->addSql('ALTER TABLE mot_cle_livre ADD CONSTRAINT FK_B6349A1E37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id_livre)');
        $this->addSql('ALTER TABLE mot_cle_livre ADD CONSTRAINT FK_B6349A1EFE94535C FOREIGN KEY (mot_cle_id) REFERENCES mot_cle (id_mot_cle)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9960BB6FE6');
        $this->addSql('ALTER TABLE emprunt_retour DROP FOREIGN KEY FK_37F52839DDEAB1A3');
        $this->addSql('ALTER TABLE emprunt_retour DROP FOREIGN KEY FK_37F5283937D925CB');
        $this->addSql('ALTER TABLE mot_cle_livre DROP FOREIGN KEY FK_B6349A1E37D925CB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99194B4BCC');
        $this->addSql('ALTER TABLE mot_cle_livre DROP FOREIGN KEY FK_B6349A1EFE94535C');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9959027487');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE emprunt_retour');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE mot_cle_livre');
        $this->addSql('DROP TABLE maison_edt');
        $this->addSql('DROP TABLE mot_cle');
        $this->addSql('DROP TABLE theme');
    }
}
