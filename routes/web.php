<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/

Route::get('/', [CategoryController::class, 'index'])->name('categorias.index');

/*
|--------------------------------------------------------------------------
| Categorías
|--------------------------------------------------------------------------
*/

Route::prefix('categorias')->group(function () {
    // Formulario para crear categoría
    Route::get('/create', [CategoryController::class, 'create'])->name('categorias.create');

    // Guardar nueva categoría
    Route::post('/', [CategoryController::class, 'store'])->name('categorias.store');

    // Ver ítems dentro de una categoría
    Route::get('/{category}', [ItemController::class, 'index'])->name('items.byCategory');
});

/*
|--------------------------------------------------------------------------
| Ítems
|--------------------------------------------------------------------------
*/

Route::prefix('items')->group(function () {
    // ✅ Mueve la búsqueda arriba de la ruta con parámetro
    Route::get('/search', [SearchController::class, 'search'])->name('items.search');

    // Otras rutas
    Route::get('/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/', [ItemController::class, 'store'])->name('items.store');
    Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::get('/{item}', [ItemController::class, 'show'])->name('items.show');
});
