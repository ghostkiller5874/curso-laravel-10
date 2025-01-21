<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
            [
                'nome'=>'Farofa',
                'email'=>'farofa01@outlook.com',
                'endereco'=>'rua das madeiras',
                'logradouro'=>'87 lt 01 Qd 03',
                'cep'=>'00012-123',
                'bairro'=>'capitinga',
            ]
            );
    }
}
