<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seedelés tömbbel.
        $data = [];
        $fileNameCsv = database_path('csv/products.csv');

        $rows = file($fileNameCsv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        for ($i = 1; $i < count($rows); $i++) {
            $cols = explode(';', $rows[$i]);

            $data[] = [
                'category' => $cols[0],
                'name' => $cols[1],
                'description' => $cols[2],
                'picture' => $cols[3],
                'price' => $cols[4],
                'stock' => $cols[5]
            ];
        }

        //bolvasás

        if (Product::count() === 0) {
            Product::factory()->createMany($data);
        }
    }
}
