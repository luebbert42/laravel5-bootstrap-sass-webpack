<?php

namespace App\Repositories;


abstract class  BaseRepository
{

    public function all() {
        return $this->model->all();
    }

}


