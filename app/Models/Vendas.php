<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_venda',
        'produto_id',
        'cliente_id',
    ];

    public function produto(){
        return $this->belongsTo(Produtos::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    
    public function getVendasPesquisarIndex(string $search = ''){
        $vendas = $this->whereHas('produto', function($query) use ($search) {
            $query->where('nome', 'LIKE', "%{$search}%");
        })->get();
    
        return $vendas;
    }
}
