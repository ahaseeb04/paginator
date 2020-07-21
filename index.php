<?php

require_once 'vendor/autoload.php';

$configuration = new \Doctrine\DBAL\Configuration();

$connection = \Doctrine\DBAL\DriverManager::getConnection([
    'dbname' => 'paginator',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
]);

$queryBuilder = $connection->createQueryBuilder();
$queryBuilder->select('*')->from('users');

$paginationBuilder = new \App\Pagination\Builder($queryBuilder);

$users = $paginationBuilder->paginate($_GET['page'] ?? 1, 10);
