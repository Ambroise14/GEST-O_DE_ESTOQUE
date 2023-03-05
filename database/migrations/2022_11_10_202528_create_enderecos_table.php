<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments("id");
            $table->string("cep");
            $table->string('cidade');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('estado');
            $table->string('numero');
            $table->string('complement')->nullable();

            $table->integer("employe_id")->unsigned();
            $table->timestamps();
            $table->foreign('employe_id')->references("id")->on('employes')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
