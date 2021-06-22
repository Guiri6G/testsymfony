<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210620181129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_famille ADD id_famille_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_famille ADD CONSTRAINT FK_77A8A5E322DFB53 FOREIGN KEY (id_famille_id) REFERENCES famille (id)');
        $this->addSql('CREATE INDEX IDX_77A8A5E322DFB53 ON sous_famille (id_famille_id)');
        $this->addSql('ALTER TABLE sous_sous ADD id_sous_famille_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_sous ADD CONSTRAINT FK_E0CAF0A9881EDE6 FOREIGN KEY (id_sous_famille_id) REFERENCES sous_famille (id)');
        $this->addSql('CREATE INDEX IDX_E0CAF0A9881EDE6 ON sous_sous (id_sous_famille_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_famille DROP FOREIGN KEY FK_77A8A5E322DFB53');
        $this->addSql('DROP INDEX IDX_77A8A5E322DFB53 ON sous_famille');
        $this->addSql('ALTER TABLE sous_famille DROP id_famille_id');
        $this->addSql('ALTER TABLE sous_sous DROP FOREIGN KEY FK_E0CAF0A9881EDE6');
        $this->addSql('DROP INDEX IDX_E0CAF0A9881EDE6 ON sous_sous');
        $this->addSql('ALTER TABLE sous_sous DROP id_sous_famille_id');
    }
}
