<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ResourcesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["name" => "home"],                 // 1

            ["name" => "tipos.index"],          // 2
            ["name" => "tipos.show"],           // 3
            ["name" => "tipos.create"],         // 4
            ["name" => "tipos.edit"],           // 5
            ["name" => "tipos.delete"],         // 6

            ["name" => "usuarios.index"],        // 7
            ["name" => "usuarios.show"],         // 8
            ["name" => "usuarios.ban"],          // 9

            ["name" => "bebidas.index"],            // 10
            ["name" => "bebidas.show"],             // 11
            ["name" => "bebidas.create"],           // 12
            ["name" => "bebidas.edit"],             // 13
            ["name" => "bebidas.moverParaAdega"],   // 14
            ["name" => "bebidas.delete"],           // 15

            ["name" => "dashboard.index"],          // 16
            ["name" => "dashboard.report"]          // 17

        ];


        DB::table('resources')->insert($data);
    }
}
