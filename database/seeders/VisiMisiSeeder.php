<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                "param" => "visi",
                "value" => "Lorem ipsum dolor sit amet",
                "description" => "Visi",
            ],
            [
                "param" => "misi",
                "value" => "foya,foya",
                "description" => "Misi",
            ],
            [
                "param" => "image",
                "value" => "",
                "description" => "Gambar",
            ]
        ])->each(function ($item) {
            $today = [
                "created_at" => now(),
                "updated_at" => now(),
            ];
            DB::table("visi_misis")->insert(array_merge($item, $today));
        });
    }
}
