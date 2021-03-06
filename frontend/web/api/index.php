<?php

use ZnYii\App\Kernel;
use ZnYii\App\Loader\AdvancedLoader;

require __DIR__ . '/../../../vendor/autoload.php';

ZnCore\Base\Libs\DotEnv\DotEnv::init(__DIR__ . '/../../..');
$_ENV['PROJECT_DIR'] = realpath(__DIR__ . '/../../..');
$_ENV['APP_DIR'] = realpath(__DIR__ . '/../../../api');
$_ENV['APP_NAME'] = 'api';

$loader = new AdvancedLoader($_ENV);
$kernel = new Kernel($_ENV, $loader);
$mainConfig = $kernel->run();

$application = new yii\web\Application($mainConfig);
$application->run();