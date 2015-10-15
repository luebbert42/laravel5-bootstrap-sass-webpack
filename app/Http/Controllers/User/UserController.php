<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function __construct() {
        parent::__construct();
    }


    public function index() {

        $users = $this->userService->all();

        return view('user/index',
            array("users" => $users)
        );

    }
}