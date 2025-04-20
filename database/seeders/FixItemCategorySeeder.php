<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;

class FixItemCategorySeeder extends Seeder
{
    public function run()
    {
        // Obtener categorías indexadas por código
        $categories = Category::all()->keyBy('codigo');

        // Asignar category_id según el código que está en el campo `category`
        foreach (Item::all() as $item) {
            $codigo = $item->category;

            if (isset($categories[$codigo])) {
                $item->category_id = $categories[$codigo]->id;
                $item->save();
            }
        }
    }
}
