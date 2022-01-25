<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoUserToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
              //
              $table->bigInteger('tipo_usuario')->nullable()->unsigned()->comment('foránea: tipos_usuarios');

              $table->foreign('tipo_usuario')->references('id')->on('tipos_usuarios')->onDelete('set null')->onUpdate('set null');

            //$table->foreignId('tipo_usuario')->constrained('tipos_usuarios')->comment('foránea: Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
