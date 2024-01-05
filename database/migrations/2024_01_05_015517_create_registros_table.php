<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->timestamp('horaPeticion');
            $table->boolean('estado');
            $table->boolean('completadoConExito');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
