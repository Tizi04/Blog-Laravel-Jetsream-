<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire; // Asegúrate de importar Livewire

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
    public function boot(): void
    {
        // Registrar el componente Livewire
        Livewire::component('index-post', \App\Http\Livewire\IndexPost::class);
    }
}
