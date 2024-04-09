<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230328194217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_collaboration DROP INDEX id_collaboration, ADD INDEX IDX_DF84342A1BB81041 (id_collaboration_fk)');
        $this->addSql('ALTER TABLE artiste_collaboration DROP FOREIGN KEY artiste_collaboration_ibfk_1');
        $this->addSql('DROP INDEX id_artiste ON artiste_collaboration');
        $this->addSql('DROP INDEX id_artiste_2 ON artiste_collaboration');
        $this->addSql('DROP INDEX id_collaboration_fk ON artiste_collaboration');
        $this->addSql('ALTER TABLE artiste_collaboration CHANGE id_artiste_fk id_artiste_fk INT DEFAULT NULL, CHANGE id_collaboration_fk id_collaboration_fk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artiste_collaboration ADD CONSTRAINT FK_DF84342A1BB81041 FOREIGN KEY (id_collaboration_fk) REFERENCES collaboration (id_collaboration)');
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY fk_id_artist');
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY fk_id_sou_cat');
        $this->addSql('DROP INDEX fk_id_type ON artwork');
        $this->addSql('DROP INDEX fk_id_artist ON artwork');
        $this->addSql('ALTER TABLE artwork DROP id_type, DROP id_artist');
        $this->addSql('DROP INDEX nom_categorie ON categorie');
        $this->addSql('ALTER TABLE collaboration CHANGE type_collaboration type_collaboration VARCHAR(255) NOT NULL, CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE status status VARCHAR(255) NOT NULL, CHANGE nom_user nom_user VARCHAR(255) NOT NULL, CHANGE email_user email_user VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande CHANGE id_produit id_produit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande RENAME INDEX fl_id_artwork TO IDX_6EEAA67DF7384557');
        $this->addSql('ALTER TABLE commentaire CHANGE id_util id_util INT DEFAULT NULL, CHANGE id_artwork id_artwork INT DEFAULT NULL, CHANGE Texte texte VARCHAR(255) NOT NULL, CHANGE Date_post date_post DATE NOT NULL');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX fk_id_artwork TO IDX_67F068BC56826C06');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX fk_id_user TO IDX_67F068BC5546AEA1');
        $this->addSql('DROP INDEX fk_email ON parrainage');
        $this->addSql('DROP INDEX fk_pro ON parrainage');
        $this->addSql('DROP INDEX fk_typerole ON parrainage');
        $this->addSql('DROP INDEX fk_username ON parrainage');
        $this->addSql('ALTER TABLE parrainage CHANGE email email VARCHAR(255) NOT NULL, CHANGE username username VARCHAR(255) NOT NULL, CHANGE type_role type_role VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX id_util ON profile');
        $this->addSql('ALTER TABLE profile CHANGE bio bio VARCHAR(255) NOT NULL, CHANGE ig ig VARCHAR(255) NOT NULL, CHANGE fb fb VARCHAR(255) NOT NULL, CHANGE twitter twitter VARCHAR(255) NOT NULL, CHANGE ytb ytb VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX id_user ON reclamation');
        $this->addSql('ALTER TABLE reclamation CHANGE Titre titre VARCHAR(255) NOT NULL, CHANGE Reclamation_sec reclamation_sec VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX type_role ON role');
        $this->addSql('ALTER TABLE role CHANGE type_role type_role VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skills CHANGE id_profile id_profile INT DEFAULT NULL, CHANGE desc_skill desc_skill VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE skills RENAME INDEX fk_id_profile TO IDX_D53116705FCA037F');
        $this->addSql('ALTER TABLE sous_cat DROP FOREIGN KEY fk_type');
        $this->addSql('DROP INDEX fk_id_categorie ON sous_cat');
        $this->addSql('DROP INDEX type_sous_cat ON sous_cat');
        $this->addSql('DROP INDEX fk_type ON sous_cat');
        $this->addSql('ALTER TABLE sous_cat DROP nom_sous_cat');
        $this->addSql('ALTER TABLE store CHANGE id_piece_art id_piece_art INT DEFAULT NULL, CHANGE nom_artwork nom_artwork VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE store RENAME INDEX fk_id_produit TO IDX_FF575877CF1D26F5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY user_ibfk_1');
        $this->addSql('DROP INDEX email_user ON user');
        $this->addSql('DROP INDEX is_pro ON user');
        $this->addSql('DROP INDEX username ON user');
        $this->addSql('ALTER TABLE user CHANGE type_role type_role VARCHAR(255) DEFAULT NULL, CHANGE username username VARCHAR(255) NOT NULL, CHANGE cin_user cin_user VARCHAR(255) NOT NULL, CHANGE adresse_user adresse_user VARCHAR(255) NOT NULL, CHANGE password_user password_user VARCHAR(255) NOT NULL, CHANGE email_user email_user VARCHAR(255) NOT NULL, CHANGE is_pro is_pro TINYINT(1) NOT NULL, CHANGE img_user img_user VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64980664F62 FOREIGN KEY (type_role) REFERENCES role (type_role)');
        $this->addSql('ALTER TABLE user RENAME INDEX role TO IDX_8D93D64980664F62');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE collaboration CHANGE type_collaboration type_collaboration VARCHAR(50) NOT NULL, CHANGE titre titre VARCHAR(50) NOT NULL, CHANGE description description VARCHAR(300) NOT NULL, CHANGE status status VARCHAR(20) NOT NULL, CHANGE nom_user nom_user VARCHAR(50) NOT NULL, CHANGE email_user email_user VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE commentaire CHANGE id_artwork id_artwork INT NOT NULL, CHANGE id_util id_util INT NOT NULL, CHANGE texte Texte VARCHAR(200) NOT NULL, CHANGE date_post Date_post DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX idx_67f068bc56826c06 TO fk_id_artwork');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX idx_67f068bc5546aea1 TO fk_id_user');
        $this->addSql('ALTER TABLE artiste_collaboration DROP INDEX IDX_DF84342A1BB81041, ADD UNIQUE INDEX id_collaboration (id_collaboration_fk)');
        $this->addSql('ALTER TABLE artiste_collaboration DROP FOREIGN KEY FK_DF84342A1BB81041');
        $this->addSql('ALTER TABLE artiste_collaboration CHANGE id_collaboration_fk id_collaboration_fk INT NOT NULL, CHANGE id_artiste_fk id_artiste_fk INT NOT NULL');
        $this->addSql('ALTER TABLE artiste_collaboration ADD CONSTRAINT artiste_collaboration_ibfk_1 FOREIGN KEY (id_collaboration_fk) REFERENCES collaboration (id_collaboration) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX id_artiste ON artiste_collaboration (id_artiste_fk, id_collaboration_fk)');
        $this->addSql('CREATE UNIQUE INDEX id_artiste_2 ON artiste_collaboration (id_artiste_fk, id_collaboration_fk)');
        $this->addSql('CREATE UNIQUE INDEX id_collaboration_fk ON artiste_collaboration (id_collaboration_fk)');
        $this->addSql('CREATE INDEX nom_categorie ON categorie (nom_categorie)');
        $this->addSql('ALTER TABLE skills CHANGE id_profile id_profile INT NOT NULL, CHANGE desc_skill desc_skill TEXT NOT NULL');
        $this->addSql('ALTER TABLE skills RENAME INDEX idx_d53116705fca037f TO fk_id_profile');
        $this->addSql('ALTER TABLE commande CHANGE id_produit id_produit INT NOT NULL');
        $this->addSql('ALTER TABLE commande RENAME INDEX idx_6eeaa67df7384557 TO fl_id_artwork');
        $this->addSql('ALTER TABLE parrainage CHANGE email email VARCHAR(30) NOT NULL, CHANGE username username VARCHAR(50) NOT NULL, CHANGE type_role type_role VARCHAR(20) NOT NULL');
        $this->addSql('CREATE INDEX fk_email ON parrainage (email)');
        $this->addSql('CREATE INDEX fk_pro ON parrainage (is_pro)');
        $this->addSql('CREATE INDEX fk_typerole ON parrainage (type_role)');
        $this->addSql('CREATE INDEX fk_username ON parrainage (username)');
        $this->addSql('ALTER TABLE sous_cat ADD nom_sous_cat VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sous_cat ADD CONSTRAINT fk_type FOREIGN KEY (nom_sous_cat) REFERENCES categorie (nom_categorie)');
        $this->addSql('CREATE INDEX fk_id_categorie ON sous_cat (id_categorie)');
        $this->addSql('CREATE INDEX type_sous_cat ON sous_cat (type_sous_cat)');
        $this->addSql('CREATE INDEX fk_type ON sous_cat (nom_sous_cat)');
        $this->addSql('ALTER TABLE artwork ADD id_type INT NOT NULL, ADD id_artist INT NOT NULL');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT fk_id_artist FOREIGN KEY (id_artist) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT fk_id_sou_cat FOREIGN KEY (id_type) REFERENCES sous_cat (id_sous_cat)');
        $this->addSql('CREATE INDEX fk_id_type ON artwork (id_type)');
        $this->addSql('CREATE INDEX fk_id_artist ON artwork (id_artist)');
        $this->addSql('ALTER TABLE reclamation CHANGE titre Titre VARCHAR(10) NOT NULL, CHANGE reclamation_sec Reclamation_sec VARCHAR(200) NOT NULL, CHANGE email email VARCHAR(30) NOT NULL');
        $this->addSql('CREATE INDEX id_user ON reclamation (id_user)');
        $this->addSql('ALTER TABLE role CHANGE type_role type_role VARCHAR(20) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX type_role ON role (type_role)');
        $this->addSql('ALTER TABLE store CHANGE id_piece_art id_piece_art INT NOT NULL, CHANGE nom_artwork nom_artwork VARCHAR(11) NOT NULL');
        $this->addSql('ALTER TABLE store RENAME INDEX idx_ff575877cf1d26f5 TO fk_id_produit');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64980664F62');
        $this->addSql('ALTER TABLE user CHANGE type_role type_role VARCHAR(20) NOT NULL, CHANGE username username VARCHAR(50) NOT NULL, CHANGE cin_user cin_user VARCHAR(8) NOT NULL, CHANGE adresse_user adresse_user VARCHAR(50) NOT NULL, CHANGE password_user password_user VARCHAR(50) NOT NULL, CHANGE email_user email_user VARCHAR(50) NOT NULL, CHANGE is_pro is_pro TINYINT(1) DEFAULT 0 NOT NULL, CHANGE img_user img_user VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT user_ibfk_1 FOREIGN KEY (type_role) REFERENCES role (type_role) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX email_user ON user (email_user)');
        $this->addSql('CREATE INDEX is_pro ON user (is_pro)');
        $this->addSql('CREATE INDEX username ON user (username)');
        $this->addSql('ALTER TABLE user RENAME INDEX idx_8d93d64980664f62 TO role');
        $this->addSql('ALTER TABLE profile CHANGE bio bio TEXT NOT NULL, CHANGE ig ig TEXT NOT NULL, CHANGE fb fb TEXT NOT NULL, CHANGE twitter twitter TEXT NOT NULL, CHANGE ytb ytb TEXT NOT NULL');
        $this->addSql('CREATE INDEX id_util ON profile (id_util)');
    }
}
