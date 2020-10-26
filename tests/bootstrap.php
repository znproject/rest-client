<?php

use ZnYii\App\Kernel;
use ZnYii\App\Loader\AdvancedLoader;
use ZnCore\Base\Libs\DotEnv\DotEnv;

$_ENV['APP_ENV'] = 'test';
DotEnv::init();
$_ENV['PROJECT_DIR'] = realpath(__DIR__ . '/..');
$_ENV['APP_DIR'] = realpath(__DIR__ . '/../console');
$_ENV['APP_NAME'] = 'console';

$loader = new AdvancedLoader($_ENV);
$kernel = new Kernel($_ENV, $loader);
$mainConfig = $kernel->run();

//FileHelper::removeDirectory(__DIR__ . '/../common/runtime/cache/test');

new yii\console\Application($mainConfig);
restore_error_handler();
