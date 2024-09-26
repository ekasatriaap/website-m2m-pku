<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'param' => 'name',
                'value' => 'MAN 2 Model Pekanbaru',
                'description' => 'Nama Sekolah',
            ],
            [
                'param' => 'description',
                'value' => 'MAN 2 Pekanbaru adalah ...',
                'description' => 'Deskripsi Sekolah',
            ],
            [
                'param' => 'tagline',
                'value' => 'Madrasah Aliyah Negeri 2 Model Pekanbaru',
                'description' => 'Tagline Sekolah',
            ],
            [
                'param' => 'logo',
                'value' => '',
                'description' => 'Logo Sekolah',
            ],
            [
                'param' => 'favicon',
                'value' => '',
                'description' => 'Favicon Sekolah',
            ],
            [
                'param' => 'address',
                'value' => 'Jl. Raya Pekanbaru - Cempaka',
                'description' => 'Alamat Sekolah',
            ],
            [
                "param" => "postcode",
                "value" => "28252",
                "description" => "Kode Pos Sekolah",
            ],
            [
                "param" => "phone",
                "value" => "0821 1234 5678",
                "description" => "Nomor Telepon Sekolah",
            ],
            [
                "param" => "email",
                "value" => "ekasatria.ariaputra@gmailcom",
                "description" => "Email Sekolah",
            ],
            [
                "param" => "facebook",
                "value" => "https://www.facebook.com/ekasatria.ariaputra",
                "description" => "Facebook Sekolah",
            ],
            [
                "param" => "instagram",
                "value" => "https://www.instagram.com/ekasatriaap",
                "description" => "Instagram Sekolah",
            ],
            [
                "param" => "twitter",
                "value" => "https://www.x.com/ekasatriaap",
                "description" => "Twitter Sekolah",
            ],
            [
                "param" => "youtube",
                "value" => "https://www.youtube.com/ekasatriaap",
                "description" => "Youtube Sekolah",
            ],
            [
                "param" => "longitude",
                "value" => "101.4416",
                "description" => "Longitude Sekolah",
            ],
            [
                "param" => "latitude",
                "value" => "-0.5228",
                "description" => "Latitude Sekolah",
            ],
        ])->each(function ($data) {
            $today = [
                'created_at' => now(),
                'updated_at' => now()
            ];
            DB::table('web_settings')->insert(array_merge($data, $today));
        });
    }
}
