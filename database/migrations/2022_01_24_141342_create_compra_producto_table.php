<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_producto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('compra_id')->nullable()->unsigned()->comment('foránea: compras');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('set null')->onUpdate('set null');

            $table->bigInteger('producto_id')->nullable()->unsigned()->comment('foránea: productos');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null')->onUpdate('set null');


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
        Schema::dropIfExists('compra_producto');
    }
}
