<?php

namespace Database\Seeders;

use App\Models\SettingBerandaWeb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingBerandaWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                "param" => "section_1_title",
                "value" => "Sekilas Info",
                "description" => "Judul section 1"
            ],
            [
                "param" => "section_1_description",
                "value" => "lorem ipsum dolor sit amet",
                "description" => "Deskripsi section 1"
            ],
            [
                "param" => "section_1_image",
                "value" => "",
                "description" => "Gambar section 1"
            ],
            [
                "param" => "section_1_url_video",
                "value" => "www.youtube.com",
                "description" => "URL video section 1"
            ],
            [
                "param" => "section_2_title",
                "value" => "Sambutan Kepala Sekolah",
                "description" => "Judul section 2"
            ],
            [
                "param" => "section_2_description",
                "value" => "lorem ipsum dolor sit amet",
                "description" => "Deskripsi section 2"
            ],
            [
                "param" => "section_2_image",
                "value" => "",
                "description" => "Gambar section 2"
            ],
            [
                "param" => "section_2_name",
                "value" => "John Doe",
                "description" => "Nama Kepala Sekolah"
            ],
            [
                "param" => "section_2_jabatan",
                "value" => "Kepala Madrasah",
                "description" => "Jabatan Kepala Sekolah"
            ],
            [
                "param" => "section_2_foto",
                "value" => "",
                "description" => "Foto Kepala Sekolah"
            ],
            [
                "param" => "section_3_title",
                "value" => "kelas Program",
                "description" => "Judul section 3"
            ],
            [
                "param" => "section_3_description",
                "value" => "lorem ipsum dolor sit amet",
                "description" => "Deskripsi section 3"
            ],
            [
                "param" => "section_3_image",
                "value" => "",
                "description" => "Gambar section 3"
            ],
            [
                "param" => "section_4_title",
                "value" => "Pembelajaran Digital",
                "description" => "Judul section 4"
            ],
            [
                "param" => "section_4_description",
                "value" => "lorem ipsum dolor sit amet",
                "description" => "Deskripsi section 4"
            ],
            [
                "param" => "section_4_image",
                "value" => "",
                "description" => "Gambar section 4"
            ]
        ])->each(function ($item) {
            DB::table('setting_beranda_webs')->insert($item);
        });
    }
}
