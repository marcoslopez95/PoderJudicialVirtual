<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned()->comment('foránea: users');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');

            $table->date('fecha')->comment('fecha de facturación');
            $table->float('base')->comment('precio base sin impuestos');
            $table->float('impuestos')->comment('impuestos en moneda');
            $table->float('total')->unsigned()->comment('total de la compra: base + impuesto');

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
        Schema::dropIfExists('facturas');
    }
}
