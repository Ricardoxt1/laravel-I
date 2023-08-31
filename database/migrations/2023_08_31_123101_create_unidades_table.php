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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); // cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // adicionar relacionamento de unidades com produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidades_id');
            $table->foreign('unidades_id')->references('id')->on('unidades');
        });

        // adicionar relacionamento de unidades com produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidades_id');
            $table->foreign('unidades_id')->references('id')->on('unidades');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // acrescentar remoção de relacionamentos de unidades com produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign('produto_detalhes_unidades_id_foreign');
            $table->dropColumn('unidades_id');
        });
        
        // acrescentar remoção de relacionamentos de unidades com produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_unidades_id_foreign');
            $table->dropColumn('unidades_id');
        });

        // remoção da tabela unidades
        Schema::dropIfExists('unidades');
    }
};
