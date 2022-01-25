<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacturaToCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
            //
            $table->bigInteger('factura_id')->nullable()->unsigned()->comment('foránea: factura, puede ser nula debido a que se puede registrar una compra sin necesidad de facturar');

            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('set null')->onUpdate('set null');
            //$table->foreignId('factura_id')->constrained('facturas')->comment('foránea: factura, puede ser nula debido a que se puede registrar una compra sin necesidad de facturar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            //
        });
    }
}
