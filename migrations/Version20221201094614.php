<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201094614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video DROP description2, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE thumnbnail thumbnail VARCHAR(255) DEFAULT NULL, CHANGE video_file video VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video ADD description2 LONGTEXT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE thumbnail thumnbnail VARCHAR(255) DEFAULT NULL, CHANGE video video_file VARCHAR(255) NOT NULL');
    }
}
