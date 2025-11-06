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
       $data = 
       [
            [
                'category' => 'Bogyós',
                'name' => 'Málna2',
                'description' => 'Kézzel termelt egészség',
                'picture' => 'https://hur.webmania.cc/img/malna.jpg',
                'price' => 3800,
                'stock' => 500,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Áfonya',
                'description' => 'Az erdő kincse az otthonodba',
                'picture' => 'https://hur.webmania.cc/img/afonya.jpg',
                'price' => 3250,
                'stock' => 120,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Szeder',
                'description' => 'A hagyományos csemege',
                'picture' => 'https://hur.webmania.cc/img/szeder.jpg',
                'price' => 1700,
                'stock' => 40,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Eper',
                'description' => 'Egy tavaszi harapás',
                'picture' => 'https://hur.webmania.cc/img/eper.jpg',
                'price' => 1440,
                'stock' => 0,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Homoktövis',
                'description' => 'Mezei csemege',
                'picture' => 'https://hur.webmania.cc/img/homoktovis.jpg',
                'price' => 3200,
                'stock' => 100,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Som',
                'description' => 'A fanyar gyönyör',
                'picture' => 'https://hur.webmania.cc/img/som.jpg',
                'price' => 900,
                'stock' => 10,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Fanyarka',
                'description' => 'Édes mint a méz',
                'picture' => 'https://hur.webmania.cc/img/fanyarka.jpg',
                'price' => 990,
                'stock' => 25,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Piszke',
                'description' => 'Egres',
                'picture' => 'https://hur.webmania.cc/img/piszke.jpg',
                'price' => 750,
                'stock' => 100,
            ],
            [
                'category' => 'Bogyós',
                'name' => 'Ribizli',
                'description' => 'Fanyar, vasban gazdag',
                'picture' => 'https://hur.webmania.cc/img/ribizli.jpg',
                'price' => 1300,
                'stock' => 170,
            ],
            [
                'category' => 'Magyaros',
                'name' => 'Meggy',
                'description' => 'A falusi kincs',
                'picture' => 'https://hur.webmania.cc/img/meggy.jpg',
                'price' => 600,
                'stock' => 300,
            ],
            [
                'category' => 'Magyaros',
                'name' => 'Cseresznye',
                'description' => 'A falusi kincs',
                'picture' => 'https://hur.webmania.cc/img/cseresznye.jpg',
                'price' => 900,
                'stock' => 300,
            ],
            [
                'category' => 'Magyaros',
                'name' => 'Szilva',
                'description' => 'A falusi kincs',
                'picture' => 'https://hur.webmania.cc/img/szilva.jpg',
                'price' => 770,
                'stock' => 200,
            ],
        ];
       
        if (Product::count() === 0) {
            Product::factory()->createMany($data);
        }
    }
}
