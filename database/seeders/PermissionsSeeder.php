<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Usuário
        $data = [
            ["role_id" => 1, "resource_id" => 1, "permission" => 1],    // home

            ["role_id" => 1, "resource_id" => 2, "permission" => 0],    // tipos.index
            ["role_id" => 1, "resource_id" => 3, "permission" => 0],    // tipos.show
            ["role_id" => 1, "resource_id" => 4, "permission" => 0],    // tipos.create
            ["role_id" => 1, "resource_id" => 5, "permission" => 0],    // tipos.edit
            ["role_id" => 1, "resource_id" => 6, "permission" => 0],    // tipos.delete

            ["role_id" => 1, "resource_id" => 7, "permission" => 0],    // usuarios.index
            ["role_id" => 1, "resource_id" => 8, "permission" => 0],    // usuarios.show
            ["role_id" => 1, "resource_id" => 9, "permission" => 0],    // usuarios.ban

            ["role_id" => 1, "resource_id" => 10, "permission" => 1],    // bebidas.index
            ["role_id" => 1, "resource_id" => 11, "permission" => 1],    // bebidas.show
            ["role_id" => 1, "resource_id" => 12, "permission" => 1],    // bebidas.create
            ["role_id" => 1, "resource_id" => 13, "permission" => 1],    // bebidas.edit
            ["role_id" => 1, "resource_id" => 14, "permission" => 1],    // bebidas.moverParaAdega
            ["role_id" => 1, "resource_id" => 15, "permission" => 1],    // bebidas.delete

            ["role_id" => 1, "resource_id" => 16, "permission" => 1],    //  dashboard.index
            ["role_id" => 1, "resource_id" => 17, "permission" => 1],    //  dashboard.report

            // Adm

            ["role_id" => 2, "resource_id" => 1, "permission" => 1],    // home

            ["role_id" => 2, "resource_id" => 2, "permission" => 1],    // tipos.index
            ["role_id" => 2, "resource_id" => 3, "permission" => 1],    // tipos.show
            ["role_id" => 2, "resource_id" => 4, "permission" => 1],    // tipos.create
            ["role_id" => 2, "resource_id" => 5, "permission" => 1],    // tipos.edit
            ["role_id" => 2, "resource_id" => 6, "permission" => 1],    // tipos.delete

            ["role_id" => 2, "resource_id" => 7, "permission" => 1],    // usuarios.index
            ["role_id" => 2, "resource_id" => 8, "permission" => 1],    // usuarios.show
            ["role_id" => 2, "resource_id" => 9, "permission" => 1],    // usuarios.ban

            ["role_id" => 2, "resource_id" => 10, "permission" => 1],    // bebidas.index
            ["role_id" => 2, "resource_id" => 11, "permission" => 1],    // bebidas.show
            ["role_id" => 2, "resource_id" => 12, "permission" => 1],    // bebidas.create
            ["role_id" => 2, "resource_id" => 13, "permission" => 1],    // bebidas.edit
            ["role_id" => 2, "resource_id" => 14, "permission" => 1],    // bebidas.moverParaAdega
            ["role_id" => 2, "resource_id" => 15, "permission" => 1],    // bebidas.delete

            ["role_id" => 2, "resource_id" => 16, "permission" => 1],    //  dashboard.index
            ["role_id" => 2, "resource_id" => 17, "permission" => 1],    //  dashboard.report
        ];

    DB::table('permissions')->insert($data);
    }

}
