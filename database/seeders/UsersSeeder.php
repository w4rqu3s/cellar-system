<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            [
                "name" => "USUARIO TESTE",
                "email" => "user@gmail.com",
                "password" => Hash::make('12345678')
            ],
        ];
        DB::table('users')->insert($data);
    }
}
