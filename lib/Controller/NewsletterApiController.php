<?php
declare(strict_types=1);

namespace OCA\ClubSuiteNewsletter\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;
use OCA\ClubSuiteNewsletter\Service\NewsletterService;

class NewsletterApiController extends Controller {
    private $service;
    public function __construct(string $appName, IRequest $request, NewsletterService $service) {
        parent::__construct($appName, $request);
        $this->service = $service;
    }
    
    /** @NoAdminRequired */
    public function index(): DataResponse {
        return new DataResponse($this->service->findAll());
    }
    
    /** @NoAdminRequired */
    public function create(string $subject, ?string $bodyHtml): DataResponse {
        return new DataResponse($this->service->createCampaign($subject, $bodyHtml));
    }
}
