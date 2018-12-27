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
            'permission_slug' => 'admin_users',
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
        $admin1 = \App\Models\User::create([
            'firstname' => 'Achim',
            'lastname' => 'Admin',
            'email' => 'admin@example.com',
            'password' => \Hash::make('tester')
        ]);


        $user1 = \App\Models\User::create([
            'firstname' => 'Ulla',
            'lastname' => 'User',
            'email' => 'user@example.com',
            'password' => \Hash::make('tester')
        ]);


        $admins = array($admin1);
        foreach ($admins as $user) {
            // role "admin" has acl "admin_users"
            \DB::table('role_user')->insert(
                array(
                    'user_id' => $user->id,
                    'role_id' => $roleAdmin->id
                )
            );
        }


        $users = array($user1);
        foreach ($users as $user) {
            \DB::table('role_user')->insert(
                array(
                    'user_id' => $user->id,
                    'role_id' => $roleUser->id
                )
            );
        }


        // create 100 more random admins to showcase paging
        factory(\App\Models\User::class, 100)->create()->each(function ($user) {
            $user->save();
        });

    }


}