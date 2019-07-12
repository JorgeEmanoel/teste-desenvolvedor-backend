<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Pedido extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'quantidade',
        'data',
        'desconto',
        'produto_id',
        'cliente_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'data',
    ];

    /**
     * Obtém o usuário que cadastrou o pedido
     * @return Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Obtém o cliente que realizou o pedido
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente ()
    {
        return $this->belongsTo('App\Cliente');
    }

    /**
     * Obtém o produto para o qual o pedido foi feito
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produto ()
    {
        return $this->belongsTo('App\Produto');
    }

    /**
     * Obtém o valor total do pedido (preço * quantidade) sem desconto
     * @return float valor total
     */
    public function getValorTotal ()
    {
        return $this->produto->valor_unitario * $this->quantidade;
    }

    /**
     * Obtém valor do desconto em cima do valor total
     * @return float desconto
     */
    public function getDesconto ()
    {
        return $this->getValorTotal() * ($this->desconto / 100);
    }

    /**
     * Obtém o valor total do pedido com o desconto aplicado
     * @return float valor total com desconto
     */
    public function getValorTotalComDesconto ()
    {
        return $this->getValorTotal() - $this->getDesconto();
    }

    /**
     * Seta o valor do campo data para um aceito no banco
     * @return void
     */
    public function setDataAttribute ($value)
    {
        $this->attributes['data'] = Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s');
    }
}
