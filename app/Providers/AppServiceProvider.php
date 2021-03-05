<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        app('view')->composer('layouts.app', function ($view) {
            $action = app('request')->route()->getAction();

            $routeName = app('request')->route()->getName();

            $controller = strtolower(str_replace('Controller', '', class_basename($action['controller'])));

            list($controller, $action) = explode('@', $controller);

            $view->with(compact('routeName', 'controller', 'action'));

            View::share('key', 'value');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    // ...
    }
}
