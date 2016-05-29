<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160526205327 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cdu (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_942E877B77153098 (code), UNIQUE INDEX UNIQ_942E877B6DE44026 (description), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE copy (id INT AUTO_INCREMENT NOT NULL, article INT DEFAULT NULL, copyNumber VARCHAR(255) NOT NULL, addedOn DATE NOT NULL, lost TINYINT(1) NOT NULL, damaged TINYINT(1) NOT NULL, note VARCHAR(255) DEFAULT NULL, available TINYINT(1) NOT NULL, INDEX IDX_4DBABB8223A0E66 (article), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Reader (id INT AUTO_INCREMENT NOT NULL, recordNumber VARCHAR(255) NOT NULL, nif VARCHAR(9) NOT NULL, firstName VARCHAR(255) NOT NULL, lastName VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, denied TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_CB938C0A9A5F57A2 (recordNumber), UNIQUE INDEX UNIQ_CB938C0AE7927C74 (email), UNIQUE INDEX UNIQ_CB938C0A14B78418 (photo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_64C19C16DE44026 (description), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loan (id INT AUTO_INCREMENT NOT NULL, reader_id INT DEFAULT NULL, copy_id INT DEFAULT NULL, loanDate DATE NOT NULL, returnDate DATE DEFAULT NULL, INDEX IDX_C5D30D031717D737 (reader_id), INDEX IDX_C5D30D03A8752772 (copy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, cdu INT DEFAULT NULL, category INT DEFAULT NULL, refNumber VARCHAR(255) NOT NULL, isbn VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255) DEFAULT NULL, authors LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', editionYear INT DEFAULT NULL, publisher VARCHAR(255) NOT NULL, legalDeposit VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, note VARCHAR(500) DEFAULT NULL, loanable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_23A0E6668CF933C (refNumber), UNIQUE INDEX UNIQ_23A0E66CC1CF4E6 (isbn), INDEX IDX_23A0E66942E877B (cdu), INDEX IDX_23A0E6664C19C1 (category), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE copy ADD CONSTRAINT FK_4DBABB8223A0E66 FOREIGN KEY (article) REFERENCES article (id)');
        $this->addSql('ALTER TABLE loan ADD CONSTRAINT FK_C5D30D031717D737 FOREIGN KEY (reader_id) REFERENCES Reader (id)');
        $this->addSql('ALTER TABLE loan ADD CONSTRAINT FK_C5D30D03A8752772 FOREIGN KEY (copy_id) REFERENCES copy (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66942E877B FOREIGN KEY (cdu) REFERENCES cdu (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6664C19C1 FOREIGN KEY (category) REFERENCES category (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66942E877B');
        $this->addSql('ALTER TABLE loan DROP FOREIGN KEY FK_C5D30D03A8752772');
        $this->addSql('ALTER TABLE loan DROP FOREIGN KEY FK_C5D30D031717D737');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6664C19C1');
        $this->addSql('ALTER TABLE copy DROP FOREIGN KEY FK_4DBABB8223A0E66');
        $this->addSql('DROP TABLE cdu');
        $this->addSql('DROP TABLE copy');
        $this->addSql('DROP TABLE Reader');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE loan');
        $this->addSql('DROP TABLE article');
    }
}
