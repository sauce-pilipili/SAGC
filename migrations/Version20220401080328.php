<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220401080328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE infos ADD nom_document VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherents CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu_de_naissance lieu_de_naissance VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE departement_de_naissance departement_de_naissance VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nationalite nationalite VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE discipline discipline VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_identite photo_identite VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom_dupere nom_dupere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom_du_pere prenom_du_pere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone_du_pere telephone_du_pere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_du_pere adresse_du_pere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville_du_pere ville_du_pere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal_du_pere code_postal_du_pere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom_de_la_mere nom_de_la_mere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom_de_la_mere prenom_de_la_mere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone_de_la_mere telephone_de_la_mere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_de_la_mere adresse_de_la_mere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville_de_la_mere ville_de_la_mere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal_de_la_mere code_postal_de_la_mere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE profession_du_pere profession_du_pere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE profession_de_la_mere profession_de_la_mere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE certificat_medical certificat_medical VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE questionnaire_sante_sport questionnaire_sante_sport VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE attestation_sante_sport attestation_sante_sport VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE adversaires CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE logo logo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE articles CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE meta_description meta_description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image_en_avant image_en_avant VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE legende_photo_en_avant legende_photo_en_avant VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categories CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipes CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_equipe photo_equipe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipes_categories CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE infos DROP nom_document, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE document document VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE joueurs CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE poste poste VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image_portrait image_portrait VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE matchs CHANGE lieu_du_match lieu_du_match VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
