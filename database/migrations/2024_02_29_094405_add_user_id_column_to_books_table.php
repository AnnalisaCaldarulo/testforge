<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //voglio creare una colonna che si chiama user_id  con questo tipo di dato
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            //questa colonna accetta un dato ESTERNO (=foreign)
            //questo dato esterno fa riferimento alla COLONNA ID della TABELLA USERS
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //PRIMA DICIAMO CHE LA COLONNA NON E' PIU' UNA CHIAVE ESTERNA
            $table->dropForeign(['user_id']);   //? sintassi estesa: 'books_user_id_foreign'
            //droppare la colonna
            $table->dropColumn('user_id');
        });
    }
};
