<?php
namespace OCA\ClubSuiteNewsletter\Migrations;

use OCP\AppFramework\Db\SchemaTrait;
use OCP\Migration\IMigration;
use OCP\Migration\IOutput;

class Version20260105_AddIndexes implements IMigration {
    use SchemaTrait;

    public function changeSchema(IOutput $output) {
        $schema = $this->getSchema();
        if ($schema->hasTable('newsletter_campaign')) {
            $t = $schema->getTable('newsletter_campaign');
            if (!$t->hasIndex('idx_newsletter_campaign_created')) $t->addIndex(['created_at'], 'idx_newsletter_campaign_created');
        }
        if ($schema->hasTable('newsletter_recipient')) {
            $t = $schema->getTable('newsletter_recipient');
            if (!$t->hasIndex('idx_newsletter_recipient_campaign')) $t->addIndex(['campaign_id'], 'idx_newsletter_recipient_campaign');
            if (!$t->hasIndex('idx_newsletter_recipient_email')) $t->addIndex(['email'], 'idx_newsletter_recipient_email');
        }
    }

    public function up(IOutput $output) { $this->changeSchema($output); }
    public function down(IOutput $output) { }
}
