<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200217193748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE VIEW post_report_view AS (
                                        SELECT 
                                            p.id AS post_id, 
                                            a.name AS author_name, 
                                            p.title AS post_title, 
                                            p.content AS post_content, 
                                            count(c.id) as post_comment_count 
                                        FROM post p 
                                            JOIN author a ON p.author_id = a.id 
                                            JOIN comment c ON p.id = c.post_id 
                                        GROUP BY p.id, p.author_id, p.title, p.content
                                        )'
        );
    }

    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DROP VIEW post_report_view');
    }
}
