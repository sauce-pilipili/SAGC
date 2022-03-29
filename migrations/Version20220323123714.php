<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323123714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prã©nom VARCHAR(255) NOT NULL, genre TINYINT(1) NOT NULL, lieu_de_naissance VARCHAR(255) DEFAULT NULL, departement_de_naissance VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, date_de_naissance DATE DEFAULT NULL, discipline VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, photo_identite VARCHAR(255) DEFAULT NULL, nom_dupere VARCHAR(255) DEFAULT NULL, prenom_du_pere VARCHAR(255) DEFAULT NULL, telephone_du_pere VARCHAR(255) DEFAULT NULL, adresse_du_pere VARCHAR(255) DEFAULT NULL, ville_du_pere VARCHAR(255) DEFAULT NULL, code_postal_du_pere VARCHAR(255) DEFAULT NULL, nom_de_la_mere VARCHAR(255) DEFAULT NULL, prenom_de_la_mere VARCHAR(255) DEFAULT NULL, telephone_de_la_mere VARCHAR(255) DEFAULT NULL, adresse_de_la_mere VARCHAR(255) DEFAULT NULL, ville_de_la_mere VARCHAR(255) DEFAULT NULL, code_postal_de_la_mere VARCHAR(255) DEFAULT NULL, profession_du_pere VARCHAR(255) DEFAULT NULL, profession_de_la_mere VARCHAR(255) DEFAULT NULL, modalite_de_pratique TINYINT(1) DEFAULT NULL, autorisation_prise_de_vue TINYINT(1) DEFAULT NULL, autorisation_activite_sagc TINYINT(1) DEFAULT NULL, connaissance_info_notice_assurance_dommage_corpo TINYINT(1) DEFAULT NULL, autorisation_de_quitter_les_lieux_en_fin_activitã© TINYINT(1) DEFAULT NULL, autorisation_pratique_aniveau_sup TINYINT(1) DEFAULT NULL, autorisation_prise_en_charge_medicale_accident TINYINT(1) DEFAULT NULL, engagement_deplacement_competition TINYINT(1) DEFAULT NULL, connaissance_reglement_interieur TINYINT(1) DEFAULT NULL, certification_sur_honneur_excactitdue_renseignement TINYINT(1) DEFAULT NULL, certificat_medical VARCHAR(255) DEFAULT NULL, questionnaire_sante_sport VARCHAR(255) DEFAULT NULL, attestation_sante_sport VARCHAR(255) DEFAULT NULL, location_de_patin TINYINT(1) DEFAULT NULL, pointure_des_patins INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adherents');
        $this->addSql('ALTER TABLE adversaires CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE logo logo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE articles CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE meta_description meta_description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image_en_avant image_en_avant VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE legende_photo_en_avant legende_photo_en_avant VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipes CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_equipe photo_equipe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipes_categories CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE matchs CHANGE lieu_du_match lieu_du_match VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
