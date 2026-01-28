<?php
declare(strict_types=1);

namespace OCA\ClubSuiteNewsletter\AppInfo;

use OCA\ClubSuiteNewsletter\Privacy\Register;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\IContainer;
use OCA\ClubSuiteNewsletter\Service\CacheService;
use OCA\ClubSuiteNewsletter\Service\EventService;
use OCA\ClubSuiteNewsletter\Listener\NewsletterBasicEventListener;
use OCA\ClubSuiteNewsletter\Listener\NewsletterCallbackEventListener;
use OCA\ClubSuiteNewsletter\Listener\NewsletterRequestDataEventListener;
use OCA\ClubSuiteNewsletter\Events\NewsletterBasicEvent;
use OCA\ClubSuiteNewsletter\Events\NewsletterCallbackEvent;
use OCA\ClubSuiteNewsletter\Events\NewsletterRequestDataEvent;

if (!\class_exists('OCA\ClubSuiteNewsletter\AppInfo\Application', false)) {
class Application extends App implements IBootstrap {
    public const APP_ID = 'clubsuite-newsletter';

    public function __construct(array $urlParams = []) {
        parent::__construct(self::APP_ID, $urlParams);
        $container = $this->getContainer();
        $container->registerService('CacheService', function(IContainer $c){ return new CacheService($c->query('ICache')); });
        $container->registerService('EventService', function(IContainer $c){ return new EventService(\OC::$server->getEventDispatcher()); });
    }

    public function register(IRegistrationContext $context): void {
        $context->registerEventListener(NewsletterBasicEvent::class, NewsletterBasicEventListener::class);
        $context->registerEventListener(NewsletterCallbackEvent::class, NewsletterCallbackEventListener::class);
        $context->registerEventListener(NewsletterRequestDataEvent::class, NewsletterRequestDataEventListener::class);
    }

    public function boot(IBootContext $context): void {
        $context->injectFn(function(\OCP\IContainer $c) {
            if (\interface_exists('\OCP\Privacy\IManager')) {
                $c->get(\OCP\Privacy\IManager::class)->registerProvider(Register::class);
            }
        });
    }
}

}
