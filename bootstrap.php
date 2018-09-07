<?php 

require __DIR__.'/vendor/autoload.php';

$router = new Sauim\Framework\Router;

$router->add('GET','/', function(){
    return 'Estamos no menu principal';
});

$router->add('GET','/produtos/(\d+)', function($params){
    var_dump($params);
    return 'Estamos no menu produtos';
});

try{
    echo $router->run();
} catch(\Sauim\Framework\Exceptions\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}
