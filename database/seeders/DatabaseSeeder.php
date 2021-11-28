<?php

namespace Database\Seeders;
use App\Models\{ Auteur, Product };
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Auteur::factory()
        ->has(Product::factory()->count(4))
        ->count(100)
        ->create();
        
    }
}
