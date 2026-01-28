<?php
return [
    'routes' => [
        ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
        ['name' => 'newsletter_api#index', 'url' => '/api/campaigns', 'verb' => 'GET'],
        ['name' => 'newsletter_api#create', 'url' => '/api/campaigns', 'verb' => 'POST'],
    ]
];
