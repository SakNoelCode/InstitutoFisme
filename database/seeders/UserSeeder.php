<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = [
            [
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678')
            ]
        ];

        foreach ($registros as $item) {
          User::create($item);
        }
    }
}
