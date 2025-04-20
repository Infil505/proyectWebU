<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('data/items.csv');
        $file = fopen($path, 'r');
        $header = fgetcsv($file); // omitimos la cabecera

        while (($row = fgetcsv($file)) !== false) {
            Item::create([
                'name' => $row[1],
                'category_id' => $row[9],
                'type' => $row[2],
                'brand' => $row[3],
                'price' => $row[4],
                'discount' => $row[5],
                'final_price' => $row[6],
                'stock' => $row[7],
                'short_description' => $row[8],

                
            ]);
        }

        fclose($file);
    }
}

