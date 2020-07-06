<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200702134628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module ADD difficulty_id INT NOT NULL, ADD image_id INT NOT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628FCFA9DAE FOREIGN KEY (difficulty_id) REFERENCES difficulty (id)');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C2426283DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_C242628FCFA9DAE ON module (difficulty_id)');
        $this->addSql('CREATE INDEX IDX_C2426283DA5256D ON module (image_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628FCFA9DAE');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C2426283DA5256D');
        $this->addSql('DROP INDEX IDX_C242628FCFA9DAE ON module');
        $this->addSql('DROP INDEX IDX_C2426283DA5256D ON module');
        $this->addSql('ALTER TABLE module DROP difficulty_id, DROP image_id');
    }
}
