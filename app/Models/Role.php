<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * users() one-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function users()
    {
        return $this->hasMany('App\Models\User\User');
    }

    /**
     * permissions() many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}