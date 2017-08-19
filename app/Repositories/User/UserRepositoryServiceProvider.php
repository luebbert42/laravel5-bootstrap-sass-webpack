<?php namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;


class UserRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\User\UserInterface', function($app){
            return new UserRepository(new User());
        });
    }
}