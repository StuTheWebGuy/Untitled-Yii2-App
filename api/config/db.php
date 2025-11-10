<?php

$host = env('DB_HOST');
$port = env('DB_PORT');
$name = env('DB_NAME');
$user = env('DB_USER');
$password = env('DB_PASSWORD');

use yii\db\Connection;

return [
    'class' => Connection::class,
    'dsn' => "mysql:host={$host};port={$port};dbname={$name}",
    'username' => $user,
    'password' => $password,
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    // 'enableSchemaCache' => true,
    // 'schemaCacheDuration' => 60,
    // 'schemaCache' => 'cache',
];
