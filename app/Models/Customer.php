<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'birth',
        'cpf'
    ];

    //Métodos de Escopo
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    //Relacionamentos
    public function contatos()
    {
        return $this->belongsToMany(Contato::class, 'contato_cliente', 'customer_id', 'contato_id'); //customer_id
    }
}
