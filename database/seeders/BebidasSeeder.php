<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BebidasSeeder extends Seeder
{
    public function run(): void
    {

        $fotos = [
            database_path('seeders/fotos/bebidas/cl_suave.jpg'),
            database_path('seeders/fotos/bebidas/cl_seco.jpg'),
            database_path('seeders/fotos/bebidas/white_horse.jpg'),
            database_path('seeders/fotos/bebidas/corona.jpg'),
            database_path('seeders/fotos/bebidas/red_label.jpeg')
        ];

        $data = require database_path('data/bebidas.php');

        foreach($data as &$bebida) {
            
            if(!empty($fotos)) {
                $foto_ord = array_shift($fotos);
                $ext =  pathinfo($foto_ord, PATHINFO_EXTENSION);
                $nome_arquivo = Str::uuid() . '.' . $ext;

                Storage::disk('public')->putFileAs('fotos', $foto_ord, $nome_arquivo);

                $bebida['foto'] = 'fotos/'.$nome_arquivo;
            } else {
                $bebida['foto'] = null;
            }
        }

        DB::table('bebidas')->insert($data);
    }
}
