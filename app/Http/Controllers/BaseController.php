<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests;

    /** @var \App\Services\User\UserService $userService */
    protected $userService;


    function __construct() {
        $this->currentUser     =    \Auth::user();
        $this->userService     =    \App::make('\App\Services\User\UserService');
    }

    protected function transformDateFromFrontend($value) {
        if (is_null($value)) return null;
        if (strlen($value) === 0) {
            return null;
        }
        $dt = \DateTime::createFromFormat(\Config::get("custom.dateformat"),$value);
        if ($dt instanceof \DateTime) {
            return $dt->format(\Config::get("custom.mysqldateformat"));
        }
        return $value;
    }

    protected function transformDateToFrontend($value) {
        if (is_null($value) || ($value == "0000-00-00 00:00:00")) return;
        $dt = \DateTime::createFromFormat(\Config::get("custom.mysqldateformat"),$value);
        if ($dt instanceof \DateTime) {
            return $dt->format(\Config::get("custom.dateformat"));
        }
        return $value;
    }

}