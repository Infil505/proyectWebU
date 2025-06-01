<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
{
    $categorias = Category::with('items')->get();

    return Inertia::render('categorias/index', [
        'categorias' => $categorias
    ]);
}


    public function create()
    {
        return Inertia::render('categorias/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria' => 'required|string|max:255',
            'codigo' => 'required|string|max:100|unique:categorias,codigo',
        ]);

        Category::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }
}
