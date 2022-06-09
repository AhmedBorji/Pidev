<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510203350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, cat VARCHAR(255) NOT NULL, date DATE NOT NULL, contenu VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel INT NOT NULL, pays VARCHAR(255) NOT NULL, gouvernorat VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, birthday DATE NOT NULL, profile_pic VARCHAR(255) DEFAULT NULL, cv VARCHAR(255) DEFAULT NULL, about_you LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_commentaire (candidate_id INT NOT NULL, commentaire_id INT NOT NULL, INDEX IDX_A6A3B20091BD8781 (candidate_id), INDEX IDX_A6A3B200BA9CD190 (commentaire_id), PRIMARY KEY(candidate_id, commentaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, candidate_id_id INT NOT NULL, offre_id INT NOT NULL, etat VARCHAR(255) NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, date_postuler DATE NOT NULL, INDEX IDX_E33BD3B847A475AB (candidate_id_id), INDEX IDX_E33BD3B84CC8505A (offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, color VARCHAR(7) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_offre (id INT AUTO_INCREMENT NOT NULL, logo VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, color VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, mobile INT NOT NULL, commentaire VARCHAR(255) NOT NULL, date DATE NOT NULL, blog_id INT NOT NULL, rate INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT NOT NULL, nom VARCHAR(255) NOT NULL, about LONGTEXT NOT NULL, adresse VARCHAR(255) NOT NULL, tel INT NOT NULL, siteweb VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, linkdin VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, profil_pic VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id_event INT AUTO_INCREMENT NOT NULL, nbplace INT NOT NULL, nomevent VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, prix INT NOT NULL, description VARCHAR(255) NOT NULL, eventpic VARCHAR(255) NOT NULL, PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, lieu INT DEFAULT NULL, entreprise_id INT DEFAULT NULL, nbr INT NOT NULL, par_id INT NOT NULL, ent_id INT NOT NULL, date DATE NOT NULL, description VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, datefin DATE NOT NULL, backcolor VARCHAR(255) NOT NULL, bordercolor VARCHAR(255) NOT NULL, textcolor VARCHAR(255) NOT NULL, INDEX IDX_3BAE0AA72F577D59 (lieu), INDEX IDX_3BAE0AA7A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, idcategorie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, secteur VARCHAR(255) NOT NULL, date DATE NOT NULL, status INT NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, datefin DATE NOT NULL, backcolor VARCHAR(7) NOT NULL, bordercolor VARCHAR(7) NOT NULL, textcolor VARCHAR(7) NOT NULL, INDEX IDX_404021BFFA5A9824 (idcategorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_user (formation_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_DA4C33095200282E (formation_id), INDEX IDX_DA4C3309A76ED395 (user_id), PRIMARY KEY(formation_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_dislike (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_BBC4A9D15200282E (formation_id), INDEX IDX_BBC4A9D1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_like (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_FBBCA5F35200282E (formation_id), INDEX IDX_FBBCA5F3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friendship (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, friend INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interview (id INT AUTO_INCREMENT NOT NULL, enteprise_id INT DEFAULT NULL, cand_id INT DEFAULT NULL, date_temps DATETIME NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, abreviation VARCHAR(4) DEFAULT NULL, INDEX IDX_CF1D3C34F3060E4C (enteprise_id), INDEX IDX_CF1D3C34EFDCE0A3 (cand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, lieu VARCHAR(255) NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, idcategorie_id INT DEFAULT NULL, iduser_id INT DEFAULT NULL, enteprise_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_AF86866FFA5A9824 (idcategorie_id), INDEX IDX_AF86866F786A81FB (iduser_id), INDEX IDX_AF86866FF3060E4C (enteprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, eventid INT NOT NULL, date DATE NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, mobile INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant_event (participant_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_FA1BA31E9D1C3019 (participant_id), INDEX IDX_FA1BA31E71F7E88B (event_id), PRIMARY KEY(participant_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, user_email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, claim LONGTEXT NOT NULL, submit_date VARCHAR(255) NOT NULL, cstatus TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_evenement (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, telephone INT NOT NULL, idEvenement INT DEFAULT NULL, INDEX IDX_116109816B3CA4B (id_user), INDEX IDX_11610981F7CC4348 (idEvenement), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, martial VARCHAR(255) NOT NULL, military VARCHAR(255) NOT NULL, education VARCHAR(255) NOT NULL, skills VARCHAR(255) NOT NULL, experience VARCHAR(255) NOT NULL, projects VARCHAR(255) NOT NULL, user_id INT NOT NULL, interests VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, haja INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, type TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', status TINYINT(1) NOT NULL, ver_token VARCHAR(255) NOT NULL, passchange LONGTEXT NOT NULL, typeC VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_commentaire ADD CONSTRAINT FK_A6A3B20091BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidate_commentaire ADD CONSTRAINT FK_A6A3B200BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B847A475AB FOREIGN KEY (candidate_id_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B84CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72F577D59 FOREIGN KEY (lieu) REFERENCES map (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFFA5A9824 FOREIGN KEY (idcategorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE formation_user ADD CONSTRAINT FK_DA4C33095200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_user ADD CONSTRAINT FK_DA4C3309A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_dislike ADD CONSTRAINT FK_BBC4A9D15200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE formation_dislike ADD CONSTRAINT FK_BBC4A9D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formation_like ADD CONSTRAINT FK_FBBCA5F35200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE formation_like ADD CONSTRAINT FK_FBBCA5F3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE interview ADD CONSTRAINT FK_CF1D3C34F3060E4C FOREIGN KEY (enteprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE interview ADD CONSTRAINT FK_CF1D3C34EFDCE0A3 FOREIGN KEY (cand_id) REFERENCES candidature (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FFA5A9824 FOREIGN KEY (idcategorie_id) REFERENCES categorie_offre (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FF3060E4C FOREIGN KEY (enteprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE participant_event ADD CONSTRAINT FK_FA1BA31E9D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant_event ADD CONSTRAINT FK_FA1BA31E71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_evenement ADD CONSTRAINT FK_116109816B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation_evenement ADD CONSTRAINT FK_11610981F7CC4348 FOREIGN KEY (idEvenement) REFERENCES evenement (id_event)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate_commentaire DROP FOREIGN KEY FK_A6A3B20091BD8781');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B847A475AB');
        $this->addSql('ALTER TABLE interview DROP FOREIGN KEY FK_CF1D3C34EFDCE0A3');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFFA5A9824');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FFA5A9824');
        $this->addSql('ALTER TABLE candidate_commentaire DROP FOREIGN KEY FK_A6A3B200BA9CD190');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7A4AEAFEA');
        $this->addSql('ALTER TABLE interview DROP FOREIGN KEY FK_CF1D3C34F3060E4C');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FF3060E4C');
        $this->addSql('ALTER TABLE reservation_evenement DROP FOREIGN KEY FK_11610981F7CC4348');
        $this->addSql('ALTER TABLE participant_event DROP FOREIGN KEY FK_FA1BA31E71F7E88B');
        $this->addSql('ALTER TABLE formation_user DROP FOREIGN KEY FK_DA4C33095200282E');
        $this->addSql('ALTER TABLE formation_dislike DROP FOREIGN KEY FK_BBC4A9D15200282E');
        $this->addSql('ALTER TABLE formation_like DROP FOREIGN KEY FK_FBBCA5F35200282E');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72F577D59');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B84CC8505A');
        $this->addSql('ALTER TABLE participant_event DROP FOREIGN KEY FK_FA1BA31E9D1C3019');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44BF396750');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60BF396750');
        $this->addSql('ALTER TABLE formation_user DROP FOREIGN KEY FK_DA4C3309A76ED395');
        $this->addSql('ALTER TABLE formation_dislike DROP FOREIGN KEY FK_BBC4A9D1A76ED395');
        $this->addSql('ALTER TABLE formation_like DROP FOREIGN KEY FK_FBBCA5F3A76ED395');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F786A81FB');
        $this->addSql('ALTER TABLE reservation_evenement DROP FOREIGN KEY FK_116109816B3CA4B');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE candidate_commentaire');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_offre');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_user');
        $this->addSql('DROP TABLE formation_dislike');
        $this->addSql('DROP TABLE formation_like');
        $this->addSql('DROP TABLE friendship');
        $this->addSql('DROP TABLE interview');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE participant_event');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reservation_evenement');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE user');
    }
}
