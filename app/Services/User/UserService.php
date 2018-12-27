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
            throw new \InvalidArgumentException("roleSlug expected");
        }
        return $this->repo->findRoleBySlug($roleSlug);
    }


    public function collectUsers(array $filters) {
        $this->repo->setFilters($filters);
        return $this->repo->collectUsers();
    }

    public function collectUsersPaginated(array $filters) {
        $this->repo->setFilters($filters);
        return $this->repo->collectUsersPaginated(50);
    }

}


