<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $super_settings = [];

        $super_settings_data = Setting::where('workspace_id', 1)->get();
        foreach ($super_settings_data as $super_setting) {
            $super_settings[$super_setting->key] = $super_setting->value;
        }

        $language = $super_settings['language'] ?? 'en';
        App::setLocale($language);
        View::share("super_settings", $super_settings);
        date_default_timezone_set(Config::get('app.timezone'));
    }
}
