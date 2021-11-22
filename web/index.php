<?php

use app\funciones\SGCApplication;

require __DIR__ . '/../vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__."/../");
    $dotenv->load();
} catch (Exception $e) {
    print($e);
}
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

require __DIR__ . '/../funciones/SGCApplication.php';

//(new yii\web\Application($config))->run();
(new SGCApplication($config))->run();
