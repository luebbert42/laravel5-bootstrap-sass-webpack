<?php

namespace App\Repositories;


abstract class  BaseRepository
{

    public function all() {
        return $this->model->all();
    }

    public function byId($id) {
        if (!isset($id) && !(is_int($id))) {
            throw new \InvalidArgumentException("Int id expected");
        }
        return $this->model->findOrFail($id);
    }

}


