<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {


    const ROLE_ADMIN = "admin";
    const ROLE_DEFAULT = "user";

    public static function getRolesAsArray() {
        return array(
            self::ROLE_ADMIN => "Admin",
            self::ROLE_DEFAULT  => "Default User"
        );
    }

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