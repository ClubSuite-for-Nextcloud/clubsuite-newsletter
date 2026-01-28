<?php
namespace OCA\ClubSuiteNewsletter\Job;

use OCP\BackgroundJob\QueuedJob;

class NewsletterSendJob extends QueuedJob {
    public function __construct() { parent::__construct(); }
    public function run($argument) {
        // placeholder: send emails in batches using MailService
    }
}
