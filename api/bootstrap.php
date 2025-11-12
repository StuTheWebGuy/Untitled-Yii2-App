<?php

require __DIR__ . '/vendor/autoload.php';

$dotenvRepository = Dotenv\Repository\RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(Dotenv\Repository\Adapter\ArrayAdapter::class)
    ->immutable()
    ->make();

$dotenv = Dotenv\Dotenv::create($dotenvRepository, __DIR__);
$dotenv->safeLoad();

/**
 * Get the value of an environment variable.
 *
 * @param string $key The environment variable key.
 *
 * @return mixed The value of the environment variable or null if not set.
 */
function env(string $key): mixed {
    global $dotenvRepository;

    if ($dotenvRepository->has($key)) {
        return $dotenvRepository->get($key);
    }

    return null;
}

defined('YII_DEBUG') or define('YII_DEBUG', filter_var(env('YII_DEBUG') ?? false, FILTER_VALIDATE_BOOLEAN));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV') ?? 'prod');

if (YII_ENV === 'dev') {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
