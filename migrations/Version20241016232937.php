<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241016232937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add example_entity table.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE example_entity (id UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN example_entity.id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE example_entity');
    }
}
