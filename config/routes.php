<?php

use App\Models\Users;

$router->add('GET','/', function() use ($container) {
    $user = new Users($container);
    $data = $user->get(1);
    var_dump($data);
    return 'Estamos no menu principal';
});

$router->add('GET','/produtos/(\d+)', '\App\Controllers\UsersController::show');
