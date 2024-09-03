<?php

namespace Database\Seeders\fakedata;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataAkun = [
            [
                'name' => 'Aerell',
                'username' => 'aerell',
                'email' => 'aerell@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Nico',
                'username' => 'nico',
                'email' => 'nico@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Habib',
                'username' => 'habib',
                'email' => 'habib@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Nia',
                'username' => 'nia',
                'email' => 'nia@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Dian',
                'username' => 'dian',
                'email' => 'dian@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Rudi',
                'username' => 'rudi',
                'email' => 'rudi@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Siti',
                'username' => 'siti',
                'email' => 'siti@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Budi',
                'username' => 'budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Lina',
                'username' => 'lina',
                'email' => 'lina@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Andi',
                'username' => 'andi',
                'email' => 'andi@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];

        foreach ($dataAkun as $key => $value) {
            User::create($value);
        }
    }
}
