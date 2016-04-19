<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\EditUserRequest;

class UserController extends BaseController
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


    public function store(EditUserRequest $request) {

        $user = new \App\Models\User();


        $input = $request->all(); // $fillable in User.php filters a subset from $input
        $user->fill($input);
        $user->password = \Hash::make($this->generateRandomString());
        $user->save();

        $roleAdmin = $this->userService->getRoleBySlug(\App\Models\Role::ROLE_ADMIN);

        // add new role
        \App\Models\User::find($user->id)->roles()->attach($roleAdmin->id);

        return redirect()->back()->with('status', "Der Benutzer wurde angelegt. Das Passwort kann der Benutzer sich über die Passwort-Vergessen-Funktion zuschicken lassen.");
    }


    public function create() {
        $user = new \App\Models\User();
        return view('user/create',
            array(
                "user" => $user,
            )
        );
    }


    public function update($id, EditUserRequest $request)
    {
        $user =  $this->userService->byId((int)$id);
        $input = $request->all(); // $fillable in User.php filters a subset from $input
        $user->fill($input)->save();
        return redirect()->back()->with('status', "Die Änderungen wurden gespeichert.");
    }


    public function edit($id)
    {
        $user =  $this->userService->byId($id);
        return view('user/edit',
            array(
                "user" => $user,
            )
        );
    }


    protected function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}