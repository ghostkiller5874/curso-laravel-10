<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Vendas;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendas::create(
            [
                'numero_venda'=>'10',
                'produto_id'=>'7',
                'cliente_id'=>'2',
            ]
            );
    }
}
