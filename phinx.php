<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
return
    [
        'paths'         => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
            'seeds'      => '%%PHINX_CONFIG_DIR%%/database/seeds'
        ],
        'environments'  => [
            'default_migration_table' => 'migrations',
            'default_environment'     => 'development',
            'production'              => [
                'adapter' => 'mysql',
                'host'    => 'localhost',
                'name'    => 'production_db',
                'user'    => 'root',
                'pass'    => '',
                'port'    => '3306',
                'charset' => 'utf8',
            ],
            'development'             => [
                'adapter' => 'mysql',
                'host'    => $_ENV['APP_DBHOST'],
                'name'    => $_ENV['APP_DBNAME'],
                'user'    => $_ENV['APP_USERNAME'],
                'pass'    => $_ENV['APP_PASSWORD'],
                'port'    => $_ENV['APP_DBPORT'],
                'charset' => 'utf8',
            ],
            'testing'                 => [
                'adapter' => 'mysql',
                'host'    => 'localhost',
                'name'    => 'testing_db',
                'user'    => 'root',
                'pass'    => '',
                'port'    => '3306',
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
