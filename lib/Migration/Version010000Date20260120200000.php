<?php
declare(strict_types=1);

namespace OCA\ClubSuiteNewsletter\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;
use OCP\Migration\SimpleMigrationStep;

class Version010000Date20260120200000 extends SimpleMigrationStep {

    public function changeSchema(IOutput $output, Closure $schemaClosure, array $options): ?ISchemaWrapper {
        $schema = $schemaClosure();

        if (!$schema->hasTable('clubsuite_campaigns')) {
            $table = $schema->createTable('clubsuite_campaigns');
            $table->addColumn('id', 'integer', ['autoincrement' => true, 'notnull' => true]);
            $table->addColumn('subject', 'string', ['notnull' => true, 'length' => 255]);
            $table->addColumn('body_html', 'text', ['notnull' => false]);
            $table->addColumn('created_at', 'integer', ['notnull' => true]);
            $table->addColumn('sent_at', 'integer', ['notnull' => false]);
            $table->setPrimaryKey(['id']);
        }

        if (!$schema->hasTable('clubsuite_recipients')) {
            $table = $schema->createTable('clubsuite_recipients');
            $table->addColumn('id', 'integer', ['autoincrement' => true, 'notnull' => true]);
            $table->addColumn('campaign_id', 'integer', ['notnull' => true]);
            $table->addColumn('email', 'string', ['notnull' => true, 'length' => 255]);
            $table->addColumn('status', 'integer', ['notnull' => true, 'default' => 0]); 
            $table->setPrimaryKey(['id']);
            $table->addIndex(['campaign_id'], 'idx_rec_campaign');
        }

        return $schema;
    }
}
