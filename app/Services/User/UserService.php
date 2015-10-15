<?php

 namespace App\Services\User;

use \App\Repositories\User\UserInterface;

class UserService extends \App\Services\BaseService
{



    /** @var \App\Repositories\User\UserRepository $repo */
    protected $repo;

    public function __construct(UserInterface $userRepo)
    {
        $this->repo = $userRepo;
    }
    
}


