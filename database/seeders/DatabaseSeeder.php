<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolesSeeder::class);
        $this->call(ResourcesSeeder::class);
        $this->call(PermissionsSeeder::class);

        $this->call(UsersSeeder::class);
        $this->call(TiposSeeder::class);
        $this->call(BebidasSeeder::class);
    }
}
