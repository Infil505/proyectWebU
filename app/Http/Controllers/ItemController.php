<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Laravel\Pail\ValueObjects\Origin\Console;

class ItemController extends Controller
{

    public function index(Category $category, Request $request)
    {
        $query = Item::with('category')->where('category_id', $category->id);

        if ($request->has('tipo')) {
            $query->where('type', $request->tipo);
        }

        $items = $query->paginate(10);

        return view('items.index', compact('category', 'items'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->input('category');

        return view('items.create', compact('categories', 'categoryId'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }


    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());
        return redirect()->route('items.show', $item);
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        return redirect()->route('items.show', $item);
    }

    public function show(Item $item)
    {
        $item->load('category');
        return view('items.show', compact('item'));
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('categories.index');
    }
}
