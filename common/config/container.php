<?php

use Illuminate\Container\Container;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use ZnCore\Base\Libs\I18Next\Facades\I18Next;
use ZnCore\Base\Libs\I18Next\Interfaces\Services\TranslationServiceInterface;
use ZnCore\Base\Libs\I18Next\Services\TranslationService;
use ZnSandbox\Sandbox\Log\LoggerFactory;
use ZnSandbox\Sandbox\YiiRbac\Interfaces\RepositoryInterface;

$translationService = new TranslationService([], Yii::$app->language);
$translationService->setLanguage('ru');
I18Next::setService($translationService);

$manager = \ZnLib\Db\Factories\ManagerFactory::createManagerFromEnv();

$singletons = [
    LoggerInterface::class => function () {
        return LoggerFactory::createMonologLogger($_ENV['APP_ENV'], 'common/runtime/monolog');
    },
    ContainerInterface::class => function () {
        return Container::getInstance();
    },
    \yii\caching\CacheInterface::class => function () {
        return \Yii::$app->cache;
    },
    \yii\db\Connection::class => function () {
        return \Yii::$app->db;
    },
    RepositoryInterface::class => function () {
        return new \ZnSandbox\Sandbox\YiiRbac\Repositories\DbManager(\Yii::$app->db, \Yii::$app->cache);
    },
    TranslationServiceInterface::class => $translationService,
    \ZnLib\Db\Capsule\Manager::class => function () use ($manager) {
        return $manager;
    }
];

$definitions = [
    'ZnBundle\User\Domain\Interfaces\Entities\IdentityEntityInterface' => 'ZnBundle\User\Yii2\Entities\IdentityEntity',
];
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/zntool/rest-client/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/dashboard/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/user/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/notify/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/queue/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/zncrypt/jwt/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/zncrypt/base/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/reference/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/messenger/src/Domain/config/container.php'));

$container = Container::getInstance();
foreach ($definitions as $abstract => $concrete) {
    $container->bind($abstract, $concrete, true);
}
foreach ($singletons as $abstract => $concrete) {
    $container->singleton($abstract, $concrete);
}

return [
    'definitions' => $definitions,
    'singletons' => $singletons,
];