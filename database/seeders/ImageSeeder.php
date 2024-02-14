<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Image::create([
            'name'=>'product01.png',
            'product_id'=>1,
            'uuid'=>Str::uuid()
        ]);
        Image::create([
            'name'=>'product08.png',
            'product_id'=>2,
            'uuid'=>Str::uuid()
        ]);
        Image::create([
            'name'=>'product08.png',
            'product_id'=>3,
            'uuid'=>Str::uuid()
        ]);
        Image::create([
            'name'=>'product07.png',
            'product_id'=>4,
            'uuid'=>Str::uuid()
        ]);
        Image::create([
            'name'=>'product09.png',
            'product_id'=>5,
            'uuid'=>Str::uuid()
        ]);
        Image::create([
            'name'=>'product02.png',
            'product_id'=>6,
            'uuid'=>Str::uuid()
        ]);
        Image::create([
            'name'=>'product05.png',
            'product_id'=>7,
            'uuid'=>Str::uuid()
        ]);
    }
}
