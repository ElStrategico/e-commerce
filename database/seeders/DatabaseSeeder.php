<?php

namespace Database\Seeders;

use App\Models\Produce\Product;
use Illuminate\Database\Seeder;
use Database\Seeders\RulesTableSeeder;
use Doctrine\Inflector\Rules\English\Rules;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new RulesTableSeeder())->run();
        Product::factory()->count(100)->create();
    }
}
