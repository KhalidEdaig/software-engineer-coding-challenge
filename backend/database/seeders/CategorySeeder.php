<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'A',
        ]);
        Category::create([
            'name' => 'B',
        ]);
        Category::create([
            'name' => 'C',
        ]);

        Category::create([
            'name' => 'A-1',
            'parent_category' => 1
        ]);
        Category::create([
            'name' => 'A-2',
            'parent_category' => 1
        ]);
        Category::create([
            'name' => 'B-1',
            'parent_category' => 2
        ]);
        Category::create([
            'name' => 'B-2',
            'parent_category' => 2
        ]);
        Category::create([
            'name' => 'C-1',
            'parent_category' => 3
        ]);
        Category::create([
            'name' => 'C-2',
            'parent_category' => 3
        ]);
    }
}
