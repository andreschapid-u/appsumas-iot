<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;


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
        //
        Schema::defaultStringLength(191);
        Route::resourceVerbs([
            'create' => 'registrar',
            'store' => 'guardar',
            'edit' => 'editar',
            'update' => 'actualizar',
            'show' => 'ver',
            'destroy' => 'eliminar',
        ]);
    }
}
