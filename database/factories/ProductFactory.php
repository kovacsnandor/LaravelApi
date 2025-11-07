<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected array $productData = [
        ['category' => 'Bogyós', 'name' => 'Málna', 'description' => 'Kézzel termelt egészség', 'picture' => 'https://hur.webmania.cc/img/malna.jpg'],
        ['category' => 'Bogyós', 'name' => 'Áfonya', 'description' => 'Az erdő kincse az otthonodba', 'picture' => 'https://hur.webmania.cc/img/afonya.jpg'],
        ['category' => 'Bogyós', 'name' => 'Szeder', 'description' => 'A hagyományos csemege', 'picture' => 'https://hur.webmania.cc/img/szeder.jpg'],
        ['category' => 'Bogyós', 'name' => 'Eper', 'description' => 'Egy tavaszi harapás', 'picture' => 'https://hur.webmania.cc/img/eper.jpg'],
        ['category' => 'Bogyós', 'name' => 'Homoktövis', 'description' => 'Mezei csemege', 'picture' => 'https://hur.webmania.cc/img/homoktovis.jpg'],
        ['category' => 'Bogyós', 'name' => 'Som', 'description' => 'A fanyar gyönyör', 'picture' => 'https://hur.webmania.cc/img/som.jpg'],
        ['category' => 'Bogyós', 'name' => 'Fanyarka', 'description' => 'Édes mint a méz', 'picture' => 'https://hur.webmania.cc/img/fanyarka.jpg'],
        ['category' => 'Bogyós', 'name' => 'Piszke', 'description' => 'Egres', 'picture' => 'https://hur.webmania.cc/img/piszke.jpg'],
        ['category' => 'Bogyós', 'name' => 'Ribizli', 'description' => 'Fanyar, vasban gazdag', 'picture' => 'https://hur.webmania.cc/img/ribizli.jpg'],
        ['category' => 'Magyaros', 'name' => 'Meggy', 'description' => 'A falusi kincs', 'picture' => 'https://hur.webmania.cc/img/meggy.jpg'],
        ['category' => 'Magyaros', 'name' => 'Cseresznye', 'description' => 'A falusi kincs', 'picture' => 'https://hur.webmania.cc/img/cseresznye.jpg'],
        ['category' => 'Magyaros', 'name' => 'Szilva', 'description' => 'A falusi kincs', 'picture' => 'https://hur.webmania.cc/img/szilva.jpg'],
    ];


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Véletlenszerűen kiválasztunk egy elemet a $productData tömbből
        $randomProduct = $this->faker->randomElement($this->productData);
        $randomUniqueNumber = $this->faker->unique()->randomNumber(6, true);

        return [
            //         // Fix adatok a kiválasztott elemből
            'category' => $randomProduct['category'],
            //'name' => $randomProduct['name'] . ' (' . $this->faker->unique()->city() . ')', // Némi variáció hozzáadása
            'name' =>$randomProduct['name'] . ' ('.$randomUniqueNumber.')', // Némi variáció hozzáadása
            'description' => $randomProduct['description'],
            'picture' => $randomProduct['picture'],

            // Véletlen adatok a Faker segítségével
            'price' => $this->faker->numberBetween(500, 5000), // Véletlen ár 500 és 5000 között
            'stock' => $this->faker->numberBetween(0, 1000),   // Véletlen raktárkészlet 0 és 1000 között

            'personName' => $this->faker->name(),
            'zipcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'adress' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'dob' => $this->faker->date('Y-m-d'),

        ];
    }
}
