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
            [
                "nama_menu" => "Video",
                "url" => "/video",
                "icon" => "fa fa-image",
                "parent_id" => null,
                "urutan" => 4,
                "target" => "_self",
                "type" => "internal",
            ],
            [
                "nama_menu" => "Majalah",
                "url" => "/majalah",
                "icon" => "fa fa-image",
                "parent_id" => null,
                "urutan" => 5,
                "target" => "_self",
                "type" => "internal",
            ],
            [
                "nama_menu" => "Madrasah",
                "url" => "/madrasah",
                "icon" => "fa fa-image",
                "parent_id" => null,
                "urutan" => 6,
                "target" => "_self",
                "type" => "internal",
            ],
            [
                "nama_menu" => "Komite",
                "url" => "/komite",
                "icon" => "fa fa-image",
                "parent_id" => null,
                "urutan" => 7,
                "target" => "_self",
                "type" => "internal",
            ],
            [
                "nama_menu" => "Struktural",
                "url" => "/struktural",
                "icon" => "fa fa-image",
                "parent_id" => null,
                "urutan" => 8,
                "target" => "_self",
                "type" => "internal",
            ],
            [
                "nama_menu" => "Informasi PPDB",
                "url" => "/informasi-ppdb",
                "icon" => "fa fa-image",
                "parent_id" => null,
                "urutan" => 9,
                "target" => "_self",
                "type" => "internal",
            ],
        ])->each(function ($data) {
            DB::table('menus')->insert($data);
        });
    }
}
