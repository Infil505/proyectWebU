<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        $results = Item::where('name', 'like', "%{$query}%")
            ->orWhere('brand', 'like', "%{$query}%")
            ->orWhere('type', 'like', "%{$query}%")
            ->orWhere('short_description', 'like', "%{$query}%")
            ->paginate(10);

        return Inertia::render('search/Results', [
            'results' => $results,
            'query' => $query
        ]);
    }
}
