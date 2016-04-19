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

    public function getRoleBySlug($roleSlug) {
        if (!isset($roleSlug) && !(is_string($roleSlug))) {
            throw new \InvalidArgumentException("externID expected");
        }
        return $this->repo->findRoleBySlug($roleSlug);
    }

}


