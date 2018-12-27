<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{


    public function __construct() {
        parent::__construct();
    }


    public function index(Request $request) {

        $breadcrumbs = [];
        $breadcrumbs[route('users.index')] = "Users";

        list($filters, $search) = $this->configureSearch($request);
        $users = $this->userService->collectUsersPaginated($filters);
        return view('user/index',
            array(
                "users" => $users,
                "pager" => $users,
                "search" => $search,
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
        $breadcrumbs[route('users.index')] = "Users";
        $breadcrumbs[route('users.create')] = "New User";

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
        $breadcrumbs[route('users.index')] = "Benutzer";
        $breadcrumbs[route('users.edit', ["id" => $id])] = $user->firstname." ".$user->lastname;
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


    protected function configureSearch(Request $request) {

        $search = new User();
        $filters = [];

        if ($request->has("firstname") && (strlen($request->get("firstname")) > 0)) {
            $filters["firstname"] = $request->get("firstname");
            $search->firstname = $request->get("firstname");
        }

        if ($request->has("sort") && (strlen($request->get("sort")) > 0)) {
            $filters["sort"] = $request->get("sort");
            $search->sort = $request->get("sort");
        }

        if ($request->has("order") && (strlen($request->get("order")) > 0)) {
            $filters["order"] = $request->get("order");
            $search->order = $request->get("order");
        }

        if ($request->has("lastname") && (strlen($request->get("lastname")) > 0)) {
            $filters["lastname"] = $request->get("lastname");
            $search->lastname = $request->get("lastname");
        }

        if ($request->has("email") && (strlen($request->get("email")) > 0)) {
            $filters["email"] = $request->get("email");
            $search->email = $request->get("email");
        }

        return [$filters, $search];
    }

}