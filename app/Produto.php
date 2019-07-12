<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = [
        'nome',
        'valor_unitario',
        'codigo_de_barras',
    ];

    /**
     * Obtém o usuário que cadastrou o produto
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Busca os pedidos realizados que contenham este produto
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos ()
    {
        return $this->hasMany('App\Pedido');
    }

    /**
     * Busca os clientes que realizaram pedidos para este produto
     * @return Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function clientes ()
    {
        return $this->hasManyThrough('App\Cliente', 'App\Pedido');
    }
}
