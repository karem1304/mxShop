<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Color::create([
            'name'=>'blanc',
            'uuid'=>Str::uuid()
        ]);
        Color::create([
            'name'=>'Noir',
            'uuid'=>Str::uuid()
        ]);
        Color::create([
            'name'=>'Bleue',
            'uuid'=>Str::uuid()
        ]);
        Color::create([
            'name'=>'Rouge',
            'uuid'=>Str::uuid()
        ]);
        Color::create([
            'name'=>'Gris',
            'uuid'=>Str::uuid()
        ]);
    }
}
