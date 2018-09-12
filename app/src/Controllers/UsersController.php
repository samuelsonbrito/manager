<?php 

namespace App\Controllers;

use App\Models\Users;

class UsersController
{
    public function index($container, $request)
    {   
        return '';
    }

    public function show($container, $request)
    {   
        return $user->get($request->attributes->get(1));
    }

    public function create($container, $request)
    {   
        $user = new Users($container);
        $user->create($request->request->all());
    }
    
    public function update($container, $request)
    {   
        return '';
    }

    public function delete($container, $request)
    {   
        return '';
    }
}