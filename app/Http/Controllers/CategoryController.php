<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'categoria' => 'required|string|max:255',
        'codigo' => 'required|string|max:100|unique:categories,codigo',
    ]);

    Category::create($validated);

    return redirect()->back()->with('success', 'Categoría creada correctamente.');
}

}
