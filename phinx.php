<?php

include_once('vendor/autoload.php');

echo 'Document root: ';
echo $_SERVER['DOCUMENT_ROOT'] . "\n";

echo "FILE: " . __FILE__ . "\n";
echo "HOME: " . getenv('HOME') . "\n";


if ($_SERVER['DOCUMENT_ROOT']) {
    $dotenvFile = $_SERVER['DOCUMENT_ROOT'] . "/../.env/donannajulia";
} else {
    if (getenv('USER') == 'samhk222') {
        $dotenvFile = dirname(dirname(dirname(__FILE__))) . "/.env/donannajulia";
    } else {
        $dotenvFile = getenv('HOME') . "/.env/donannajulia";
    }
}

$dotenv = Dotenv\Dotenv::create($dotenvFile);
$dotenv->load();

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_database' => 'development',
            // 'production' => [
            //     'adapter' => 'mysql',
            //     'host' => 'localhost',
            //     'name' => 'production_db',
            //     'user' => 'root',
            //     'pass' => '',
            //     'port' => '3306',
            //     'charset' => 'utf8',
            // ],
            'development' => [
                'adapter' => 'mysql',
                'host' => getenv('DB_HOST'),
                'name' => getenv('DB_NAME'),
                'user' => getenv('DB_USER'),
                'pass' => getenv('DB_PASSWORD'),
                'port' => getenv('DB_PORT'),
                'charset' => 'utf8',
            ],
        ],
        'version_order' => 'creation'
    ];
