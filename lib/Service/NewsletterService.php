<?php
declare(strict_types=1);

namespace OCA\ClubSuiteNewsletter\Service;

use OCA\ClubSuiteNewsletter\Db\Campaign;
use OCA\ClubSuiteNewsletter\Db\CampaignMapper;

class NewsletterService {
    private $mapper;
    public function __construct(CampaignMapper $mapper) { $this->mapper = $mapper; }
    public function findAll(): array { return $this->mapper->findAll(); }
    public function createCampaign(string $subject, ?string $bodyHtml): Campaign {
        $c = new Campaign();
        $c->setSubject($subject);
        $c->setBodyHtml($bodyHtml);
        $c->setCreatedAt(time());
        return $this->mapper->insert($c);
    }
}
