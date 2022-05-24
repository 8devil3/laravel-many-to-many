<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
      Schema::defaultStringLength(191); //Inserito per risolvere l'errore 1071 in fase di migration/creazione tabelle. Documentazione "https://laravel.com/docs/7.x/migrations#creating-indexes" sezione "Index Lengths & MySQL / MariaDB" */
    }
}
