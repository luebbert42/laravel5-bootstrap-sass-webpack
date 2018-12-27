<?php

use Faker\Generator as Faker;
use Faker\Generator;
use App\Models\User;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->email,
        'password' =>  \Hash::make('tester'),
        'active' =>  true
    ];
});

$adminRole = App\Models\Role::where('role_slug', "admin")->first();
$factory->afterCreating(App\Models\User::class, function ($user, $faker) use ($adminRole) {
    \DB::table('role_user')->insert(
        array(
            'user_id' => $user->id,
            'role_id' => $adminRole->id
        )
    );
});