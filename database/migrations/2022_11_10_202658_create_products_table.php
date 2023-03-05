<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("categoria_id")->unsigned();
            $table->string("ref")->nullable();
            $table->string("nome");
            $table->text('description')->nullable();
            $table->string('poids')->nullable();
            $table->decimal("valor");
            $table->integer("stoock");
            $table->integer("desconte")->nullable();
            $table->string("image");
            $table->timestamps();
            $table->foreign('categoria_id')->references("id")->on('categorias')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
