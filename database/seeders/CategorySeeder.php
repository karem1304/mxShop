<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name'=>'Laptop',
            'uuid'=>Str::uuid()
        ]);
        Category::create([
            'name'=>'Desktop',
            'uuid'=>Str::uuid()
        ]);
        Category::create([
            'name'=>'Téléphone',
            'uuid'=>Str::uuid()
        ]);
        Category::create([
            'name'=>'Camera',
            'uuid'=>Str::uuid()
        ]);
        Category::create([
            'name'=>'Casque',
            'uuid'=>Str::uuid()
        ]);
        Category::create([
            'name'=>'Accessoire',
            'uuid'=>Str::uuid()
        ]);
    }
}
