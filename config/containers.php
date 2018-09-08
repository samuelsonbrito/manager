<?php 

use Pimple\Container;

$container = new Container();

$container['db'] = function(){
    
    $dsn = 'mysql:host=localhost;dbname=manager;charset=utf8';
    $username = 'root';
    $password = '';

    $pdo = new \PDO($dsn, $username, $password);

    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $pdo;

};