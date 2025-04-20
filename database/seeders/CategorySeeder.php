<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('data/categorias.csv');
        $file = fopen($path, 'r');
        $header = fgetcsv($file); // omitimos la cabecera

        while (($row = fgetcsv($file)) !== false) {
            Category::create([
                'codigo' => $row[0],
                'categoria' => $row[1],
            ]);
        }

        fclose($file);
    }
}
