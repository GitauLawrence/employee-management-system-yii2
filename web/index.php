<?php



use yii\web\Application;

// Composer autoloading - this loads the Yii framework and other dependencies
require __DIR__ . '/../vendor/autoload.php';

// Debug mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

// Set the @webroot alias AFTER Yii has been loaded
Yii::setAlias('@webroot', __DIR__);

$config = require __DIR__ . '/../config/web.php';

(new Application($config))->run();