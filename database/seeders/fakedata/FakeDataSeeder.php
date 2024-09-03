<?php

namespace Database\Seeders\fakedata;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AkunSeeder::class,
            CategorieSeeder::class,
            TopicSeeder::class,
            CommentSeeder::class,
            VoteSeeder::class,
        ]);
    }
}
