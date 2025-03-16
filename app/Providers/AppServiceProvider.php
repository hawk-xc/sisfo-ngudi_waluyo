<?php


namespace App\Providers;

use Carbon\Carbon;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        setlocale(LC_TIME, 'id_ID.utf8'); // Mengatur locale ke bahasa Indonesia
        Carbon::setLocale('id'); // Mengatur bahasa Indonesia untuk Carbon
    }
}
