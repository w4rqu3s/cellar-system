<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["name" => "usuario"],            // 1
            ["name" => "administrador"]       // 2
        ];
        DB::table('roles')->insert($data);
    }
}
