<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                "nama_menu" => "Beranda",
                "url" => "/",
                "icon" => "fa fa-home",
                "parent_id" => null,
                "urutan" => 1,
                "target" => "_self",
                "type" => "internal",
            ],
            [
                "nama_menu" => "Berita",
                "url" => "/berita",
                "icon" => "fa fa-newspaper",
                "parent_id" => null,
                "urutan" => 2,
                "target" => "_self",
                "type" => "internal",
            ],
            [
                "nama_menu" => "Galeri",
                "url" => "/galeri",
                "icon" => "fa fa-image",
                "parent_id" => null,
                "urutan" => 3,
                "target" => "_self",
                "type" => "internal",
            ],
        ])->each(function ($data) {
            DB::table('menus')->insert($data);
        });
    }
}
