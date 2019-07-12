<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('quantidade');
            $table->tinyInteger('status')->default(0);// 0 = em andamento, 1 = concluido, 2 = cancelado
            $table->datetime('data');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')
                ->on('clientes')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')
                ->on('produtos')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign(['cliente_id']);
            $table->dropForeign(['produto_id']);
        });

        Schema::dropIfExists('pedidos');
    }
}
