<?php

namespace App\Services;


abstract class  BaseService
{

    public function all() {
        return $this->repo->all();
    }


    public function byId($id) {
        if (!isset($id) && !(is_int($id))) {
            throw new \InvalidArgumentException("Int id expected");
        }
        return $this->repo->byId($id);
    }
}


