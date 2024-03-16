<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan Faker untuk membuat data palsu
        $faker = \Faker\Factory::create();

        // Loop untuk membuat 50 data palsu
        for ($i = 0; $i < 50; $i++) {
            // Simpan data palsu ke dalam database
            Product::create([
                'nama_barang' => $faker->word,
                'jenis' => $faker->randomElement(['makanan', 'minuman', 'bahan baku']),
            ]);
        }
    }
}
