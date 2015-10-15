<?php

 namespace App\Repositories\User;

class UserRepository extends \App\Repositories\BaseRepository implements UserInterface
{
    
    protected $model;
    
    public function __construct(\App\Models\User $user)
    {
        $this->model = $user;
    }
    
}
