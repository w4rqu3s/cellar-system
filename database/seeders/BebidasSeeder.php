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

        $data = [
            ["nome" => "Campo Largo Suave", 
            "desc" => "Vinho barato.", 
            "lista" => "adega", 
            "ano" => 2025,
            "quantidade" => 1,
            "capacidade" => 0.75,
            "valor" => 13.20,
            "user_id" => 1,
            "tipo_id" => 1
            ],
            ["nome" => "Campo Largo Seco", 
            "desc" => "Difícil de apreciar.", 
            "lista" => "adega", 
            "ano" => 2025,
            "quantidade" => 2,
            "capacidade" => 0.75,
            "valor" => 13.20,
            "user_id" => 1,
            "tipo_id" => 1
            ],
            ["nome" => "White Horse", 
            "desc" => null, 
            "lista" => "adega", 
            "ano" => 2019,
            "quantidade" => 1,
            "capacidade" => 1,
            "valor" => 60,
            "user_id" => 1,
            "tipo_id" => 2
            ],
            ["nome" => "Corona Extra Long Neck", 
            "desc" => "Ainda mais perfeito com uma fatia de limão.", 
            "lista" => "adega", 
            "ano" => 2025,
            "quantidade" => 6,
            "capacidade" => 0.35,
            "valor" => 7.49,
            "user_id" => 1,
            "tipo_id" => 3
            ],
            ["nome" => "Red Label", 
            "desc" => "Caro, mas vale a pena.", 
            "lista" => "desejos", 
            "ano" => 2024,
            "quantidade" => 1,
            "capacidade" => 1,
            "valor" => 100,
            "user_id" => 1,
            "tipo_id" => 2
            ],
        ];

        foreach($data as &$bebida) {
            $foto_ord = array_shift($fotos);

            $ext =  pathinfo($foto_ord, PATHINFO_EXTENSION);
            $nome_arquivo = Str::uuid() . '.' . $ext;

            Storage::disk('public')->putFileAs('fotos', $foto_ord, $nome_arquivo);

            $bebida['foto'] = 'fotos/'.$nome_arquivo;
        }

        DB::table('bebidas')->insert($data);
    }
}
