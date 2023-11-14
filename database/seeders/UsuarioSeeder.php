<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 1314; $i++)
        Usuario::create([
            'nome' => 'trunks '.$i,
            'cpf' => rand(11111111111,99999999999),
            'celular' => rand(18997123456,18997998765),
            'email' => 'gp0g987gp'.$i.'@gmail.com',
            'password' => Hash::make('123456')
        ]);

    }
};
