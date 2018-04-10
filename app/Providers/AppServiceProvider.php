<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /*
        * setLocale to use Carbon source locales. Enables diffForHumans() localized
        */
        Carbon::setLocale(config('app.locale'));
        Schema::defaultStringLength(191);
        //laravel 5.6变化
        //使用bootstrap3生成分页
        //Paginator::useBootstrapThree();
        //如果你想保持以前防止重复编码的行为
        //Blade::withoutDoubleEncoding();

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
