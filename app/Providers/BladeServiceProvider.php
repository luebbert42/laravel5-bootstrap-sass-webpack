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

        view::share('please_select', 'Bitte auswählen');

        Blade::directive('appFormatDate', function($expression) {
            return "<?php
             if ((!is_null($expression)) && ($expression != '0000-00-00 00:00:00')) {
               echo date(\Config::get('custom.dateformat'), strtotime($expression));
             }
             else {
               echo '-';
             }
             ?>";
        });

        Blade::directive('appFormatDateTime', function($expression) {
            return "<?php
             if ((!is_null($expression)) && ($expression != '0000-00-00 00:00:00')) {
               echo date(\Config::get('custom.datetimeformat'), strtotime($expression));
             }
             else {
               echo '-';
             }
             ?>";
        });


        Blade::directive('yesno', function ($value) {
            return "<?php
            if ($value == null) {
               echo '-';
            }
            else {
                switch ($value) {
                    case 1:
                        echo 'ja';
                        break;
                    case 0:
                        echo 'nein';
                        break;
                }
            }
            ?>";
        });

    }

    public function register()
    {
        //
    }
}