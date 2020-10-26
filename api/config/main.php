<?php

$version = API_VERSION_STRING;

return [
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => 'ZnBundle\User\Yii2\Api\Module',
        'notify' => 'ZnBundle\Notify\Yii2\Api\Module',
        'reference' => 'ZnBundle\Reference\Yii2\Api\Module',
        'restclient' => 'ZnTool\RestClient\Yii2\Api\Module',
        'messenger' => 'ZnBundle\Messenger\Yii2\Api\Module',
        'dashboard' => 'ZnBundle\Dashboard\Yii2\Api\Module',
        'eav' => 'Packages\Eav\Yii2\Api\Module',
    ],
    'components' => [
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'multipart/form-data' => 'yii\web\MultipartFormDataParser',
            ],
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'formatters' => [
                'json' => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
                'xml' => 'yii\web\XmlResponseFormatter',
            ],
        ],
        'user' => [
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null,
            'authMethod' => [
                'ZnBundle\User\Yii2\Api\Filters\Auth\HttpTokenAuth',
            ],
        ],
        'urlManager' => [
            'showScriptName' => false,
            'rules' => array_merge(
                include __DIR__ . '/../../Packages/Eav/Yii2/Api/config/routes.php',
                include __DIR__ . '/../../vendor/znbundle/messenger/src/Yii2/Api/config/routes.php',
                include __DIR__ . '/../../vendor/znbundle/user/src/Yii2/Api/config/routes.php',
                include __DIR__ . '/../../vendor/znbundle/notify/src/Yii2/Api/config/routes.php',
                include __DIR__ . '/../../vendor/zntool/rest-client/src/Yii2/Api/config/routes.php',
                include __DIR__ . '/../../vendor/znbundle/reference/src/Yii2/Api/config/routes.php',
                include __DIR__ . '/../../vendor/znbundle/dashboard/src/Yii2/Api/config/routes.php'
            ),
        ],
        'formatter' => [
            'dateFormat' => 'Y-m-d\TH:i:s\Z',
            'timeFormat' => 'Y-m-d\TH:i:s\Z',
            'datetimeFormat' => 'Y-m-d\TH:i:s\Z',
        ],
    ],
];
