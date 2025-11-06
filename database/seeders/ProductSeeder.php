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
        // $fileNameCsv = database_path('csv/products.csv');

        // $rows = file($fileNameCsv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // for ($i = 1; $i < count($rows); $i++) {
        //     $cols = explode(';', $rows[$i]);

        //     $data[] = [
        //         'category' => $cols[0],
        //         'name' => $cols[1],
        //         'description' => $cols[2],
        //         'picture' => $cols[3],
        //         'price' => (int)$cols[4],
        //         'stock' => (int)$cols[5]
        //     ];
        // }

        // var_dump($data);
        // die;
        //bolvasás

        //Profibb megoldás (nagyon nagy fájlok esetén):
        $filePath = database_path('csv/products.csv');
        $data = [];
        $header = []; // Fejlécek tárolására

        if (($handle = fopen($filePath, 'r')) !== false) {
            // 1. Beolvassuk a fejléceket (ha vannak)
            $header = fgetcsv($handle, 0, ';');

            // 2. Soronként beolvassuk az adatokat (0 azt jelenti, hogy nincs korlát a beolvasott sorra)
            while (($cols = fgetcsv($handle, 0, ';')) !== false) {
                if (count($header) === count($cols)) {
                    // Asszociatív tömb létrehozása (jobb olvashatóság!)
                    $data[] = array_combine($header, $cols);
                }
            }
            // 3. Zárjuk a fájlt (itt kötelező!)
            fclose($handle);
        }

        if (Product::count() === 0) {
            Product::factory()->createMany($data);
        }
    }
}
