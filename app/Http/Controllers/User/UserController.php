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

        $breadcrumbs = [];
        $breadcrumbs[route('admin.users.index')] = "Benutzer";


        $users = $this->userService->all();

        return view('user/index',
            array(
                "users" => $users,
                "breadcrumbs" => $breadcrumbs
            )
        );

    }


    public function store(EditUserRequest $request) {

        $user = new \App\Models\User();

        $selectedRole = $this->userService->getRoleBySlug($request->get('role_slug'));

        $input = $request->all(); // $fillable in User.php filters a subset from $input
        $user->fill($input);
        $user->password = \Hash::make($this->generateRandomString());
        $user->save();

        // add new role
        \App\Models\User::find($user->id)->roles()->attach($selectedRole->id);

        return redirect()->back()->with('status', "Der Benutzer wurde angelegt. Das Passwort kann der Benutzer sich über die Passwort-Vergessen-Funktion zuschicken lassen.");
    }


    public function create() {
        $user = new \App\Models\User();
        $roles = \App\Models\Role::getRolesAsArray();

        $breadcrumbs = [];
        $breadcrumbs[route('admin.users.index')] = "Benutzer";
        $breadcrumbs[route('admin.users.create')] = "Neuer Benutzer";

        return view('user/create',
            array(
                "user" => $user,
                "roles" => $roles,
                "breadcrumbs" => $breadcrumbs
            )
        );
    }


    public function update($id, EditUserRequest $request)
    {
        $user =  $this->userService->byId((int)$id);

        $selectedRole = $this->userService->getRoleBySlug($request->get('role_slug'));


        // remove old roles
        \App\Models\User::find($user->id)->roles()->detach();

        // add new role
        \App\Models\User::find($user->id)->roles()->attach($selectedRole->id);

        $input = $request->all(); // $fillable in User.php filters a subset from $input
        $user->fill($input)->save();
        return redirect()->back()->with('status', "Die Änderungen wurden gespeichert.");
    }


    public function edit($id)
    {

        $user =  $this->userService->byId($id);
        $breadcrumbs = [];
        $breadcrumbs[route('admin.users.index')] = "Benutzer";
        $breadcrumbs[route('admin.users.edit', ["id" => $id])] = $user->firstname." ".$user->lastname;
        $roles = \App\Models\Role::getRolesAsArray();
        return view('user/edit',
            array(
                "user" => $user,
                "breadcrumbs" => $breadcrumbs,
                "roles" => $roles
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