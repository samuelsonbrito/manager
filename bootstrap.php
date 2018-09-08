<?php 

require __DIR__.'/vendor/autoload.php';

$router = new Sauim\Framework\Router;

require __DIR__.'/config/containers.php';
require __DIR__.'/config/events.php';
require __DIR__.'/config/routes.php';

try{

    $result = $router->run();

    $response = new Sauim\Framework\Response;

    $params = [
        'container' => $container,
        'params' => $result['params']
    ];

    $response($result['action'], $params);

} catch(\Sauim\Framework\Exceptions\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}
