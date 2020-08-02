<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710162754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auteur CHANGE date_naiss date_naiss DATE DEFAULT NULL, CHANGE description description VARCHAR(4096) DEFAULT \'NULL\', CHANGE photo photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE emprunt_retour CHANGE livre_id livre_id INT DEFAULT NULL, CHANGE etudiant_id etudiant_id VARCHAR(8) DEFAULT NULL, CHANGE date_emprunt date_emprunt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_retour date_retour DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant CHANGE cin cin VARCHAR(8) NOT NULL, CHANGE num_carte num_carte VARCHAR(20) DEFAULT NULL, CHANGE date_naiss date_naiss DATE DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL, CHANGE tel tel VARCHAR(20) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE livre CHANGE auteur_id auteur_id INT DEFAULT NULL, CHANGE maison_edt_id maison_edt_id INT DEFAULT NULL, CHANGE theme_id theme_id INT DEFAULT NULL, CHANGE date_achat date_achat DATE DEFAULT NULL, CHANGE couverture couverture VARCHAR(255) NOT NULL, CHANGE lien_telechargement lien_telechargement VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE maison_edt CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\', CHANGE email email VARCHAR(100) DEFAULT \'NULL\', CHANGE site_web site_web VARCHAR(100) DEFAULT \'NULL\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE auteur CHANGE date_naiss date_naiss DATE DEFAULT \'NULL\', CHANGE description description VARCHAR(4096) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE photo photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE emprunt_retour CHANGE livre_id livre_id INT DEFAULT NULL, CHANGE etudiant_id etudiant_id CHAR(8) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_emprunt date_emprunt DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE date_retour date_retour DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE etudiant CHANGE cin cin CHAR(8) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE num_carte num_carte VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_naiss date_naiss DATE DEFAULT \'NULL\', CHANGE email email VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE photo photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE livre CHANGE auteur_id auteur_id INT DEFAULT NULL, CHANGE maison_edt_id maison_edt_id INT DEFAULT NULL, CHANGE theme_id theme_id INT DEFAULT NULL, CHANGE date_achat date_achat DATE DEFAULT \'NULL\', CHANGE couverture couverture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE lien_telechargement lien_telechargement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE maison_edt CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE site_web site_web VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`');
    }
}
