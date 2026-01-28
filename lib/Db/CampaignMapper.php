<?php
declare(strict_types=1);

namespace OCA\ClubSuiteNewsletter\Db;

use OCP\AppFramework\Db\QBMapper;
use OCP\DB\IDBConnection;

class CampaignMapper extends QBMapper {
    public function __construct(IDBConnection $db) {
        parent::__construct($db, 'clubsuite_campaigns', Campaign::class);
    }
    
    public function findAll(): array {
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')->from('clubsuite_campaigns');
        return $this->findEntities($qb);
    }
}
