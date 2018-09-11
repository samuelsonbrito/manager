<?php 

namespace App\Events;

class UsersCreated
{
    public function __invoke($e)
    {
        $event = $e->getName();
        $params = $e->getParams();
        $data = sprintf('Disparado event "%s", com parametros: %s', $event, json_encode($params));
        echo $data;
    }
}