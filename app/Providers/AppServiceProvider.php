<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
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
//        $this->background();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

//    public function background()
//    {
//        View::composer('client.layouts.app', function ($view) {
//            $view->with('background', User::query()->find(auth()->user()->id)->first());
//
//        });
//    }
}
