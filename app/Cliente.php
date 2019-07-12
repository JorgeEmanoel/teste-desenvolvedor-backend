<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
    ];

    /**
     * Obtém o usuário que cadastrou o cliente
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Busca os pedidos realizados por este cliente
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos ()
    {
        return $this->hasMany('App\Pedido');
    }

    /**
     * Seta o calor do CPF sem nenhum sinal, apenas os 11 dígitos
     * @param string cpf
     * @return void
     */
    public function setCpfAttribute ($value)
    {
        $this->attributes['cpf'] = preg_replace("/[^0-9]/", "", $value);
    }
}
