<?php

define('API_VERSION', '1');
define('API_VERSION_STRING', 'v1');

\ZnLib\Rest\Helpers\CorsHelper::autoload();

Yii::$container->set('yii\web\ErrorHandler', [
    'class' => 'ZnYii\Error\Domain\Web\ErrorHandler',
    /*'filters' => [
        'yii2bundle\rbac\domain\filters\PermissionException',
    ],*/
]);
