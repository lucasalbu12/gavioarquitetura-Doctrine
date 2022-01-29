<?php

declare(strict_types=1);

namespace Projects\Gavio\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220126131932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projetos DROP FOREIGN KEY FK_ECCCCDCB3397707A');
        $this->addSql('DROP INDEX IDX_ECCCCDCB3397707A ON projetos');
        $this->addSql('ALTER TABLE projetos DROP categoria_id, DROP imagemCapa');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projetos ADD categoria_id INT DEFAULT NULL, ADD imagemCapa VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE projetos ADD CONSTRAINT FK_ECCCCDCB3397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id)');
        $this->addSql('CREATE INDEX IDX_ECCCCDCB3397707A ON projetos (categoria_id)');
    }
}
