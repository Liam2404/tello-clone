<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddListeIdToCardsTable extends Migration
{
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->foreignId('liste_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign(['liste_id']);
            $table->dropColumn('liste_id');
        });
    }
}
