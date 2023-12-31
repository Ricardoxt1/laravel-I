<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criação de tabela para filiais
        Schema::create('filiais', function (Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        // criação de tabela para produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();
            
            // adicionando foreign key de filial_id com filiais
            $table->foreign('filial_id')->references('id')->on('filiais');
            // adicionando foreign key de produto_id com produtos
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        // removendo colunas da tabela de produtos
        Schema::table('produtos', function (Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // criando as colunas da tabela de produtos
        Schema::table('produtos', function (Blueprint $table){
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            ;
        });

        // removendo a tabela de produtos_filiais e suas foreign keys
        Schema::dropIfExists('produto_filiais');

        // removendo a tabela de filiais
        Schema::dropIfExists('filiais');
    }
};
