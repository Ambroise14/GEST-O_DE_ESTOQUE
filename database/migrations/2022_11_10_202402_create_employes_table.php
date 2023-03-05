<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("departement_id")->unsigned();
            $table->string("nome");
            $table->decimal('salaire');
            $table->string('experience')->nullable();
            $table->string('status')->default('1');
            $table->string("login");
            $table->string("cpf");
            $table->foreign('departement_id')->references("id")->on('departements')->onDelete('cascade');
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
        Schema::dropIfExists('employes');
    }
}
