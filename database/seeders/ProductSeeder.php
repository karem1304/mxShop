<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'name'=>'Mac book Pro retina 2015',
            'description'=> 'CPU 2GHZ, Ram 2GO, Disque dur 500GO, Écran Oled 4K, Clavier retro-éclairé',
            'price'=>450000,
            'firstPrice'=>600000,
            'brand_id'=>1,
            'category_id'=>1,
            'uuid'=>Str::uuid()
        ]);
        Product::create([
            'name'=>'Lenovo A420',
            'description'=> 'CPU 3GHZ, Ram 2GO, Disque dur 1000GO HDD 128GO SSD, Carte graphique NVIDIA QUADRO 5000 4GO Dédiée',
            'price'=>550000,
            'firstPrice'=>650000,
            'brand_id'=>2,
            'category_id'=>2,
            'uuid'=>Str::uuid()
        ]);
        Product::create([
            'name'=>'Dell A440',
            'description'=> 'CPU 3GHZ, Ram 2GO, Disque dur 1000GO HDD 128GO SSD, Carte graphique NVIDIA QUADRO 5000 4GO Dédiée',
            'price'=>550000,
            'firstPrice'=>650000,
            'brand_id'=>5,
            'category_id'=>2,
            'uuid'=>Str::uuid()
        ]);
        Product::create([
            'name'=>'SAMSUNG S23 ULTRA',
            'description'=> 'Disque dur 500GO, Écran Oled 4K, Écran incuver, Water-poof',
            'price'=>350000,
            'firstPrice'=>550000,
            'brand_id'=>6,
            'category_id'=>3,
            'uuid'=>Str::uuid()
        ]);
        Product::create([
            'name'=>'Camera Ionic',
            'description'=> 'Zoom 500%, double objectif',
            'price'=>350000,
            'firstPrice'=>550000,
            'brand_id'=>4,
            'category_id'=>4,
            'uuid'=>Str::uuid()
        ]);
        Product::create([
            'name'=>'Airpod Beats Audio',
            'description'=> '1 jour d\'autonomie',
            'price'=>50000,
            'firstPrice'=>75000,
            'brand_id'=>3,
            'category_id'=>5,
            'uuid'=>Str::uuid()
        ]);
        Product::create([
            'name'=>'Canne a selfie',
            'description'=> 'utile',
            'price'=>5000,
            'firstPrice'=>7500,
            'brand_id'=>7,
            'category_id'=>6,
            'uuid'=>Str::uuid()
        ]);
    }
}
