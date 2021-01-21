<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
    public function boot(){
		//Gamitin si Bootstrap sa pagination design instead na si Tailwind
		Paginator::useBootstrap();

		//iforce si HTTPS sa buong site habang nasa production mode
		//if(config('app.env') === 'production') {
        //    \URL::forceScheme('https');
        //}
         if($this->app->environment('production'))
         {
             \URL::forceScheme('https');
         }
    }
}
