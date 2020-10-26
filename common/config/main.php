<?php

use ZnBundle\Language\Domain\Enums\LanguageEnum;

return [
    'language' => LanguageEnum::RU, // current Language
    'sourceLanguage' => LanguageEnum::SOURCE, // Language development
    'timeZone' => 'UTC',
    'runtimePath' => '@common/runtime',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'container' => include('container.php'),
    'components' => [
        //'language' => 'yii2bundle\lang\domain\components\Language',
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'user' => [
            'class' => 'ZnBundle\User\Yii2\Web\User',
            'identityClass' => 'ZnBundle\User\Yii2\Entities\LoginEntity',
        ],
        'db' => [
            'class' => 'ZnLib\Db\Yii2\Components\Connection',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@' . $_ENV['CACHE_DIRECTORY'],
        ],
        /*'i18n' => [
            'class' => 'ZnBundle\Language\Yii2\I18N\I18N',
            'aliases' => [
                '*' => '@common/messages',
            ],
        ],*/
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
    ],
];
