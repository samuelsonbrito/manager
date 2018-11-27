<?php 

namespace App\Controllers;

use App\Models\Users;

class UsersController
{
    public function index($container)
    {   
        $user = new Users($container);
        return $user->all();
    }

    public function show($container, $request)
    {   
        $user = new Users($container);
        $id = $request->attributes->get(1);

        return $user->get(['id' => $id]);
    }

    public function create($container, $request)
    {   
        $user = new Users($container);
        $user->create($request->request->all());
    }
    
    public function update($container, $request)
    {   
        $id = $request->attributes->get(1);
        $user = new Users($container);
        
        return $user->update(['id' => $id], $request->request->all());
    }

    public function delete($container, $request)
    {   
        $id = $request->attributes->get(1);
        
        $user = new Users($container);
        
        return $user->delete(['id' => $id]);
    }
}