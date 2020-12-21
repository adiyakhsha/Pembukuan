<?php

namespace App\Providers;

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
    public function boot()
    {
        \App\Models\Pemasukan::observe(\App\Observers\PemasukanObserver::class);
        \App\Models\Pengeluaran::observe(\App\Observers\PengeluaranObserver::class);
    }
}
