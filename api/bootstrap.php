<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

defined('YII_DEBUG') or define('YII_DEBUG', filter_var($_ENV['YII_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN));
defined('YII_ENV') or define('YII_ENV', $_ENV['YII_ENV'] ?? 'prod');

require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
