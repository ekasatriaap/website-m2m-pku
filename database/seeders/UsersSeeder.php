<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Root',
                "email" => "ekasatria.ariaputra@gmail.com",
                "username" => "root",
                "level" => "root",
                "password" => bcrypt("el.psy.congroo"),
            ],
            [
                "name" => "Humas",
                "email" => "humas@m2mpekanbaru.sch.id",
                "username" => "humas",
                "level" => "operator",
                "password" => bcrypt("humasm2mpekanbaru"),
            ]
        ])->each(function ($user) {
            User::create($user);
        });
    }
}
