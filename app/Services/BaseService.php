<?php

namespace App\Services;


abstract class  BaseService
{

    public function all() {
        return $this->repo->all();
    }
}


