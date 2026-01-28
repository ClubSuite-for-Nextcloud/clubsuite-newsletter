<?php
declare(strict_types=1);

namespace OCA\ClubSuiteNewsletter\Db;

use OCP\AppFramework\Db\Entity;

class Campaign extends Entity {
    protected $subject;
    protected $bodyHtml;
    protected $createdAt;
    protected $sentAt;

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'bodyHtml' => $this->bodyHtml,
            'createdAt' => $this->createdAt,
            'sentAt' => $this->sentAt
        ];
    }
}
