<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TiposSeeder extends Seeder
{
    public function run(): void
    {

        Storage::disk('public')->makeDirectory('fotos');

        $fotos = [
            database_path('seeders/fotos/tipos/Vinho.png'),
            database_path('seeders/fotos/tipos/Whisky.png'),
            database_path('seeders/fotos/tipos/Cerveja.png')
        ];

        $data = require database_path('data/tipos.php');

        foreach($data as &$tipo) {
            $foto_ord = array_shift($fotos);

            $ext =  pathinfo($foto_ord, PATHINFO_EXTENSION);
            $nome_arquivo = Str::uuid() . '.' . $ext;

            Storage::disk('public')->putFileAs('fotos', $foto_ord, $nome_arquivo);

            $tipo['foto'] = 'fotos/'.$nome_arquivo;
        }

        DB::table('tipos')->insert($data);
    }
}
