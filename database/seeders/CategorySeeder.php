<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['Premier League', 'Champions League', 'International Football', 'Transfer News', 'Football Analysis'] as $name) {
            Category::factory()
                ->hasArticles(4)
                ->create(['name' => $name]);
        }
    }
}
