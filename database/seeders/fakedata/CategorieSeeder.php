<?php

namespace Database\Seeders\fakedata;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataCategorie = [
            [
                'name' => 'Programming',
            ],
            [
                'name' => 'Makanan',
            ],
            [
                'name' => 'Minuman',
            ],
            [
                'name' => 'Elektronik',
            ],
            [
                'name' => 'Pakaian',
            ],
            [
                'name' => 'Perabotan',
            ],
            [
                'name' => 'Olahraga',
            ],
            [
                'name' => 'Kesehatan',
            ],
            [
                'name' => 'Kecantikan',
            ],
            [
                'name' => 'Otomotif',
            ],
            [
                'name' => 'Buku',
            ],
        ];

        foreach ($dataCategorie as $key => $value) {
            Categorie::create($value);
        }
    }
}
