<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Brand::create([
            'name'=>'Apple',
            'uuid'=>Str::uuid()
        ]);
        Brand::create([
            'name'=>'Lenovo',
            'uuid'=>Str::uuid()
        ]);
        Brand::create([
            'name'=>'Beats Audio',
            'uuid'=>Str::uuid()
        ]);
        Brand::create([
            'name'=>'Icon',
            'uuid'=>Str::uuid()
        ]);
        Brand::create([
            'name'=>'Dell',
            'uuid'=>Str::uuid()
        ]);
        Brand::create([
            'name'=>'Samsung',
            'uuid'=>Str::uuid()
        ]);
        Brand::create([
            'name'=>'Inconnu',
            'uuid'=>Str::uuid()
        ]);
    }
}
