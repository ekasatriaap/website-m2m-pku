<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VisiMisi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $seeders = [
            UsersSeeder::class,
            WebSettingSeeder::class,
            MenuSeeder::class,
            SettingBerandaWebSeeder::class,
            DescriptionAnggotaSeeder::class,
            SettingPPDBSeeder::class,
            VisiMisiSeeder::class,
        ];
        $this->call($seeders);
    }
}
