<?php

namespace App\Repositories;


abstract class  BaseRepository
{

    const ORDER_ASC = "asc";
    const ORDER_DESC = "desc";

    public static $defaultFilters = [];

    public function all() {
        return $this->model->all();
    }

    public function byId(int $id) {
        return $this->model->findOrFail($id);
    }

}


