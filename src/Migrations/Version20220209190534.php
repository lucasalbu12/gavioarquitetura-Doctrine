<?php

declare(strict_types=1);

namespace Projects\Gavio\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209190534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorias (id INT AUTO_INCREMENT NOT NULL, nomeCategoria VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE imagens_projeto (id INT AUTO_INCREMENT NOT NULL, projeto_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, imagePath VARCHAR(255) NOT NULL, INDEX IDX_C1AB7A6C43B58490 (projeto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perfis (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, descricao LONGTEXT NOT NULL, imagePath VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projetos (id INT AUTO_INCREMENT NOT NULL, categoria VARCHAR(255) NOT NULL, titulo VARCHAR(255) NOT NULL, area VARCHAR(255) NOT NULL, ano VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, descricao LONGTEXT NOT NULL, arquivoImagem VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE imagens_projeto ADD CONSTRAINT FK_C1AB7A6C43B58490 FOREIGN KEY (projeto_id) REFERENCES projetos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE imagens_projeto DROP FOREIGN KEY FK_C1AB7A6C43B58490');
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP TABLE imagens_projeto');
        $this->addSql('DROP TABLE perfis');
        $this->addSql('DROP TABLE projetos');
        $this->addSql('DROP TABLE usuarios');
    }
}
