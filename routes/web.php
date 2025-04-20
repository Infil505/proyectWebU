<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Rutas principales
|--------------------------------------------------------------------------
*/

// Página inicial → listado de categorías
Route::get('/', [CategoryController::class, 'index'])->name('categories.index');


/*
|--------------------------------------------------------------------------
| Categorías
|--------------------------------------------------------------------------
*/

// Formulario para crear categoría
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Guardar nueva categoría
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Ver ítems dentro de una categoría
Route::get('/categories/{category}', [ItemController::class, 'index'])->name('items.byCategory');


/*
|--------------------------------------------------------------------------
| Ítems
|--------------------------------------------------------------------------
*/

// Crear ítem
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

// Guardar ítem
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

// Editar ítem
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');

// Actualizar ítem
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');

// Eliminar ítem
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

// Ver detalle del ítem
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');


/*
|--------------------------------------------------------------------------
| Búsqueda
|--------------------------------------------------------------------------
*/

Route::get('/search', [SearchController::class, 'search'])->name('items.search');
