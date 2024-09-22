<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Skin Care','image' => Storage::url('public/skin.jpg')],
            ['name' => 'Hair Care','image' => Storage::url('public/hair.jpg')],
            ['name' => 'Makeup Services','image' => Storage::url('public/Makeup.jpg')],
            ['name' => 'Nail Care','image' => Storage::url('public/nail.jpg')],
            ['name' => 'Hair Removal','image' => Storage::url('public/Hair Removal.jpg')],
            ['name' => 'Body Care','image' => Storage::url('public/body care.jpg')],
            ['name' => 'Mesotherapy','image' => Storage::url('public/Mesotherapy.jpg')],
            ['name' => 'Cosmetic Injections','image' => Storage::url('public/Cosmetic.jpg')],
            ['name' => 'Bridal Services','image' => Storage::url('public/Bridal.jpg')],
        ];

        DB::table('categories')->insert($categories);
    }
}
