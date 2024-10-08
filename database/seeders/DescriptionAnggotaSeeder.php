<?php

namespace Database\Seeders;

use App\Models\DescriptionProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            DescriptionProfile::create($item);
        });
    }
}
