<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicineData = [
            [
                'id' => 1,
                'name' => 'Ubat Gigi',
                'price' => 5,
                'stock' => 100,
            ],
            [
                'id' => 2,
                'name' => 'Panadol',
                'price' => 10,
                'stock' => 100,
            ],
            [
                'id' => 3,
                'name' => 'Ubat Batuk',
                'price' => 15,
                'stock' => 100,
            ],
        ];

        // Insert the data into the user table using Eloquent
        foreach ($medicineData as $data) {
            Medicine::create($data);
        }
    }
}
