<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingPPDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                "param" => "main_image",
                "value" => "",
                "description" => "Gambar utama yang akan digunakan di halaman utama PPDB",
            ],
            [
                "param" => "main_title",
                "value" => "PPDB MAN 2 Pekanbaru",
                "description" => "Judul utama yang akan digunakan di halaman utama PPDB",
            ],
            [
                "param" => "main_description",
                "value" => "lorem ipsum dolor sit amet",
                "description" => "Deskripsi utama yang akan digunakan di halaman utama PPDB",
            ],
            [
                "param" => "syarat_umum_description",
                "value" => "lorem ipsum dolor sit amet",
                "description" => "Deskripsi syarat umum yang akan digunakan di halaman PPDB",
            ],
            [
                "param" => "syarat_umum_image",
                "value" => "",
                "description" => "Gambar syarat umum yang akan digunakan di halaman PPDB",
            ],
            [
                "param" => "jalur_masuk_image",
                "value" => "",
                "description" => "Gambar jalur masuk yang akan digunakan di halaman PPDB",
            ],
            [
                "param" => "hook_ppdb",
                "value" => "Lebih dari 5000 orang sudah menjadi alumni MAN 2 Kota Pekanbaru. Ayo join menjadi anggota dari alumni MAN 2 Pekanbaru",
                "description" => "Kata-kata marketing untuk menarik calon siswa baru",
            ],
            [
                "param" => "link_ppdb",
                "value" => "https://man2pekanbaru.com",
                "description" => "Link pendaftaran calon siswa baru",
            ]
        ])->each(function ($item) {
            $today = [
                'created_at' => now(),
                'updated_at' => now()
            ];
            DB::table('setting_ppdb')->insert(array_merge($item, $today));
        });
    }
}
