<?php namespace App\Providers;

use Blade;
use View;
use Config;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {

        // address with @custom_directive('something') in blade template
        Blade::directive('custom_directive', function($expression) {
            return "<?php echo 'I am a custom directive'; ?>";
        });

        View::share( 'version', Config::get('version.v') );

        View::share( 'appName', Config::get('custom.name') );

    }

    public function register()
    {
        //
    }
}