<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescriptionAnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                "param" => "description_madrasah",
                "value" => "Madrasah Aliyah Negeri 2 Pekanbaru",
                "description" => "Deskripsi Profile Madrasah"
            ],
            [
                "param" => "image_madrasah",
                "value" => "",
                "description" => "Gambar Profile Madrasah"
            ],
            [
                "param" => "description_komite",
                "value" => "Komite Madrasah",
                "description" => "Deskripsi Profile Komite"
            ],
            [
                "param" => "image_komite",
                "value" => "",
                "description" => "Gambar Profile Komite"
            ],
            [
                "param" => "description_struktural",
                "value" => "Struktural",
                "description" => "Deskripsi Profile Struktural"
            ],
            [
                "param" => "image_struktural",
                "value" => "",
                "description" => "Gambar Profile Struktural"
            ],
        ])->each(function ($item) {
            $today = [
                'created_at' => now(),
                'updated_at' => now()
            ];
            DB::table('description_profiles')->insert(array_merge($item, $today));
        });
    }
}
