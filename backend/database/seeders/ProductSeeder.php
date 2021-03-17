<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'prod1',
            'description' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',
            'price' => 1.2,
            'category_id' => 1,
            'image' => 'https://picsum.photos/200/300'
        ]);
        Product::create([
            'name' => 'prod2',
            'description' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',
            'price' => 1.0,
            'category_id' => 2,
            'image' => 'https://picsum.photos/200/300'
        ]);
        Product::create([
            'name' => 'prod3',
            'description' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',
            'price' => 12,
            'category_id' => 3,
            'image' => 'https://picsum.photos/200/300'
        ]);
    }
}
