<?php

return [
    'defaultLanguage' => 'ru',
    'fallbackLanguage' => 'en',
    'bundles' => [
        'app' => 'common/i18next/__lng__/__ns__.json',
        'account' => 'vendor/znbundle/user/src/Domain/i18next/__lng__/__ns__.json',
        'error' => 'vendor/znyii/error/src/Domain/i18next/__lng__/__ns__.json',
        'user' => 'vendor/znbundle/user/src/Domain/i18next/__lng__/__ns__.json',
        //'storage' => 'vendor/znsandbox/sandbox/src/YiiLegacy/yubundle/storage/domain/v1/i18next/__lng__/__ns__.json',
        'restclient' => 'vendor/zntool/rest-client/src/Domain/i18next/__lng__/__ns__.json',
        'core' => 'vendor/zncore/base/src/i18next/__lng__/__ns__.json',
        'dashboard' => 'vendor/znbundle/dashboard/src/Domain/i18next/__lng__/__ns__.json',
    ],
];