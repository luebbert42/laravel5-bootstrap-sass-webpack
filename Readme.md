# Laravel 5.x Bootstrap

* Database seeds using fzaninotto/faker
* Symfony debugbar
* Service architecture following http://dfg.gd/blog/decoupling-your-code-in-laravel-using-repositiories-and-services
* user - roles - permissions according to http://heera.it/laravel-5-1-x-acl-middleware#.VaXrovkrLIX (1 user is assigned to one role. 1 role can have many permissions. ACLs are checked via middleware mostly in routes.php)
* PHPStorm IDE Helper
* Bootstrap SCSS/Font Awesome/Jquery - vue - webpack
* ModelNotFound & RouteNotFound && !debug -> route to stylable error pages
* BladeServiceProvider for custom directives
* Codeception for testing

# Installation


```
# clone repo
git clone https://github.com/luebbert42/laravel5-bootstrap-sass-elixir

# create env file
cp .env.example .env

# get all the fancy php stuff from web
composer install

# fix permissions (stolen from Symfony2 doc)
sudo -s

HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" storage
sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" storage
sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" bootstrap
sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" bootstrap

# adjust default users if necessary
vim database/seeds/UserTableSeeder.php

# Database-Setup 
mysql -u root -e "create database bootstrap_laravel"

# change database name and connection settings in .env if necessary
vim .env

# run migrations in empty db and add example user
php artisan migrate --seed
 

# Fronend magic 
npm install 

# Run all Mix tasks...
npm  run dev

# Run all Mix tasks and minify output...
npm  run production

# watch
npm run watch

# check that codeception is running 
codecept run

# start webserver 
php artisan serve


# login with user credentials given in database/seeds/UserTableSeeder.php
http://localhost:8000/

```