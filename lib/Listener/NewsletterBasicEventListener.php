<?php
namespace OCA\ClubSuiteNewsletter\Listener;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;

use OCA\ClubSuiteNewsletter\Events\NewsletterBasicEvent;

class NewsletterBasicEventListener implements IEventListener {
    public function handle(Event $event): void {
        if (!($event instanceof NewsletterBasicEvent)) {
            return;
        }
        error_log('NewsletterBasicEvent received in Newsletter: ' . $event->getId());
    }
}
