<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToCompraProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compra_producto', function (Blueprint $table) {
            //
            $table->float('impuesto')->nullable()->comment('impuesto del producto');
            $table->float('base')->nullable()->comment('base imponible del producto');
            $table->float('total')->nullable()->comment('total del producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compra_producto', function (Blueprint $table) {
            //
        });
    }
}
