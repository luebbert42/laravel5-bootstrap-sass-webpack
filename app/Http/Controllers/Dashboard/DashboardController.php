<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\EditUserRequest;

class DashboardController extends BaseController
{


    public function __construct() {
        parent::__construct();
    }

    public function dashboard() {

        return view('dashboard/dashboard',
            []
        );
    }
}
