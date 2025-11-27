<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BebidasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["nome" => "Campo Largo Suave", 
            "lista" => "adega", 
            "ano" => 2025,
            "quantidade" => 1,
            "capacidade" => 1,
            "valor" => 15,
            "user_id" => 1,
            "tipo" => 1
            ],
            ["nome" => "Campo Largo Tinto", 
            "lista" => "adega", 
            "ano" => 2025,
            "quantidade" => 2,
            "capacidade" => 1,
            "valor" => 17,
            "user_id" => 1,
            "tipo" => 1
            ],
            ["nome" => "White Horse", 
            "lista" => "adega", 
            "ano" => 2019,
            "quantidade" => 1,
            "capacidade" => 0.75,
            "valor" => 75,
            "user_id" => 1,
            "tipo" => 2
            ],
            ["nome" => "Corona", 
            "lista" => "adega", 
            "ano" => 2025,
            "quantidade" => 6,
            "capacidade" => 0.5,
            "valor" => 10.99,
            "user_id" => 1,
            "tipo" => 3
            ],
            ["nome" => "Red Lable", 
            "lista" => "desejos", 
            "ano" => 2024,
            "quantidade" => 1,
            "capacidade" => 1,
            "valor" => 100,
            "user_id" => 1,
            "tipo" => 2
            ],
        ];
    }
}
