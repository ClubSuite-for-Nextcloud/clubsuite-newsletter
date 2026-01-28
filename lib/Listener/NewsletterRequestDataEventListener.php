<?php
namespace OCA\ClubSuiteNewsletter\Listener;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;

use OCA\ClubSuiteNewsletter\Events\NewsletterRequestDataEvent;

class NewsletterRequestDataEventListener implements IEventListener {
    public function handle(Event $event): void {
        if (!($event instanceof NewsletterRequestDataEvent)) {
            return;
        }
        $data = ['app' => 'Newsletter', 'count' => 0];
        $event->respond($data);
    }
}
