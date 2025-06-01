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
    // Formulario para crear ítem (opcionalmente con categoría)
    Route::get('/create', [ItemController::class, 'create'])->name('items.create');

    // Guardar ítem
    Route::post('/', [ItemController::class, 'store'])->name('items.store');

    // Formulario para editar ítem
    Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');

    // Actualizar ítem
    Route::put('/{item}', [ItemController::class, 'update'])->name('items.update');

    // Eliminar ítem
    Route::delete('/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

    // Ver detalle del ítem
    Route::get('/{item}', [ItemController::class, 'show'])->name('items.show');
});

/*
|--------------------------------------------------------------------------
| Búsqueda
|--------------------------------------------------------------------------
*/

// Buscador de ítems
Route::get('/items/search', [SearchController::class, 'search'])->name('items.search');
