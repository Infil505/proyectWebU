<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index(Category $category, Request $request)
    {
        $query = Item::with('category')->where('category_id', $category->id);
        if ($request->has('tipo')) {
            $query->where('type', operator: $request->tipo);
        }
        $items = $query->paginate(10);
        return Inertia::render('items/index', [
            'category' => $category,
            'items' => $items,
            'tipo' => $request->input('tipo')
        ]);
    }

    public function create(Request $request)
    {
        $categories = Category::all(['id', 'categoria']);
        $categoryId = $request->input('category');
        return Inertia::render('items/create', [
            'categories' => $categories,
            'categoryId' => $categoryId ?? ''
        ]);
    }


    public function edit(Item $item)
    {
        $categories = Category::all();
        return Inertia::render('items/editar', [
            'item' => $item,
            'categories' => $categories
        ]);
    }

    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());

        return Inertia::location(route('items.show', $item));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('items.show', $item)->with('success', '¡Ítem actualizado correctamente!');
    }

    public function show(Item $item)
    {
        $item->load('category');
        return Inertia::render('items/show', [
            'item' => $item
        ]);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('categorias.index')
            ->with('success', '¡Ítem eliminado correctamente!');
    }
}
