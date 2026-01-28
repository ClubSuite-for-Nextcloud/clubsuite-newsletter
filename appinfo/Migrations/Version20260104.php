<?php
namespace OCA\ClubSuiteNewsletter\Migrations;

use OCP\Migration\IChange;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;

class Version20260104 implements IChange {
    public function changeSchema(ISchemaWrapper $schema, IOutput $output) {
        $c = $schema->createTable('newsletter_campaign');
        $c->addColumn('id', 'integer', ['autoincrement' => true]);
        $c->addColumn('subject', 'string', ['length' => 255]);
        $c->addColumn('body_html', 'text', ['notnull' => false]);
        $c->addColumn('body_text', 'text', ['notnull' => false]);
        $c->addColumn('created_at', 'datetime', []);
        $c->setPrimaryKey(['id']);

        $r = $schema->createTable('newsletter_recipient');
        $r->addColumn('id', 'integer', ['autoincrement' => true]);
        $r->addColumn('campaign_id', 'integer', []);
        $r->addColumn('user_id', 'integer', []);
        $r->addColumn('status', 'string', ['length' => 50]);
        $r->setPrimaryKey(['id']);

        $l = $schema->createTable('newsletter_log');
        $l->addColumn('id', 'integer', ['autoincrement' => true]);
        $l->addColumn('campaign_id', 'integer', []);
        $l->addColumn('sent_at', 'datetime', ['notnull' => false]);
        $l->addColumn('status', 'string', ['length' => 50]);
        $l->setPrimaryKey(['id']);
    }

    public function postSchemaChange(ISchemaWrapper $schema, IOutput $output) { }
}
