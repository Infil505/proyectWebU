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
    
        View::share([
            'menuCategorias' => $menuCategorias,
            'menuTipos' => $menuTipos,
        ]);
    }
}
