<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Item;

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
    // Agrupar por categoría (ej: Bicicleta, Accesorio, Componente)
    $menuCategorias = Category::all()->pluck('categoria', 'id');

    // Agrupar tipos por categoría (desde items)
    $menuTipos = Item::select('category_id', 'type')
        ->distinct()
        ->get()
        ->groupBy('category_id');

    // Compartir datos con todas las vistas
    View::share([
        'menuCategorias' => $menuCategorias,
        'menuTipos' => $menuTipos,
    ]);

    // Fuerza siempre HTTPS en producción
    if (app()->environment('production')) {
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }

    // Prefetch de Vite para mejorar la carga de recursos
    \Illuminate\Support\Facades\Vite::prefetch(concurrency: 3);
}

}
