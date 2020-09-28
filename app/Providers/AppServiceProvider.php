<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;


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
        view()->composer('welcome', function($view) {
            $all = \App\Post::all()->sortByDesc('created_at');
            $view->with('all', $all);
        });

        view()->composer('home', function ($view) {
            $my = \App\Post::where('user_id', Auth::user()->id)->get();
            $view->with('my_posts', $my);
        });
    }
}
