<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a coluna em produtos que vai receber fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) {
            //insere um fornecedor em fornecedores
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor 1',
                'site' => 'fornecedor1.com',
                'uf' => 'SP',
                'email' => 'fornecedor1@fornecedor1',

            ]);


            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
};
