<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** @var \App\Services\User\UserService $userService */
    protected $userService;

    function __construct() {
        $this->currentUser = \Auth::user();
        $this->userService =  \App::make('\App\Services\User\UserService');
    }
}
