<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppModel extends Model {

    // never try to insert those fields when using the mass assignment feature
    protected $guarded = array("_token");

    public function scopeRandom($query)
    {
        return $query->orderBy(\DB::raw('RAND()'));
    }

}

