<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
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
            Supplier::create([
                'nama_supplier' => $faker->company,
                'nama_pic' => $faker->name,
                'no_hp' => $faker->phoneNumber,
                'lokasi' => $faker->address,
            ]);
        }
    }
}
