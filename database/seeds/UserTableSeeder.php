<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserTableSeeder extends Seeder {

    public function run()
    {



        \DB::table('roles')->delete();
        $roleAdmin = \App\Models\Role::create([
            'role_title' => 'Admin',
            'role_slug' => 'admin'
        ]);

        $roleUser = \App\Models\Role::create([
            'role_title' => 'Default User',
            'role_slug' => 'user'
        ]);


        \DB::table('permissions')->delete();

        $aclUsersCrud = \App\Models\Permission::create([
            'permission_title' => 'Administrate users',
            'permission_slug' => 'users_crud',
            'permission_description' => 'May create, edit, inactivate users'
        ]);

        // role "admin" has acl "users_crud"
        \DB::table('permission_role')->insert(
            array(
                'permission_id' =>  $aclUsersCrud->id,
                'role_id' => $roleAdmin->id
            )
        );

        \DB::table('users')->delete();
        $user1 = \App\Models\User::create([
            'firstname' => 'Walther',
            'lastname' => 'Wurzel',
            'email' => 'admin@example.com',
            'password' => \Hash::make('tester!')
        ]);


        $user2 = \App\Models\User::create([
            'firstname' => 'Dorthe',
            'lastname' => 'Luebbert',
            'email' => 'dorthe@luebbert.net',
            'password' => \Hash::make('hundkatze')
        ]);

    }


}