<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

        // definisco la colonna
        $table->unsignedBigInteger('user_id')->nullable()->after('id');

        // definisco foreign key
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
        // elimina la relazione
        $table->dropForeign('posts_user_id_foreign');

        // elimina la colonna
        $table->dropColumn('user_id');
            
        });
    }
}
