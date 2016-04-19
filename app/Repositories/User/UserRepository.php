<?php

 namespace App\Repositories\User;

class UserRepository extends \App\Repositories\BaseRepository implements UserInterface
{
    
    protected $model;
    
    public function __construct(\App\Models\User $user)
    {
        $this->model = $user;
    }

    public function findRoleBySlug($roleSlug) {
        if (!isset($roleSlug) && !(is_string($roleSlug))) {
            throw new \InvalidArgumentException("String expected for roleSlug");
        }
        return \App\Models\Role::where("role_slug", $roleSlug)->first();
    }


}
