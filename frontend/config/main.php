<?php

return [
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'rest-client/project/index',
    'name' => 'Demo',
    'bootstrap' => [
        'log',
    ],
    'modules' => [
        'error' => 'ZnYii\Error\Web\Module',
        'user' => 'ZnBundle\User\Yii2\Web\Module',
        'rest-client' => 'ZnTool\RestClient\Yii2\Web\Module',
        'dashboard' => 'ZnBundle\Dashboard\Yii2\Web\Module',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => $_ENV['COOKIE_VALIDATION_KEY_WEB'],
        ],
        'user' => [
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-frontend',
                'httpOnly' => true,
            ],
            'loginUrl' => ['user/auth'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'errorHandler' => [
            'errorAction' => 'error/error/error',
        ],
        'urlManager' => [
            'rules' => array_merge(
                include __DIR__ . '/../../vendor/zntool/rest-client/src/Yii2/Web/config/routes.php',
                [
                    '/' => 'dashboard',
                ]
            ),
        ],
    ],
];
