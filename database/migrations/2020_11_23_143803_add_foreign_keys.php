<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('santas', function (Blueprint $table) {
            
            $table -> foreign('from', 'from')
                   -> references('id')
                   -> on('identities');
            
            $table -> foreign('to', 'to')
                    -> references('id')
                    -> on('identities');
        });

        Schema::table('wishes', function (Blueprint $table) {
            
            $table -> foreign('author', 'author')
                   -> references('id')
                   -> on('identities');
            
            $table -> foreign('target', 'target')
                    -> references('id')
                    -> on('identities');
        });

        Schema::table('identity_user', function (Blueprint $table) {
            
            $table -> foreign('identity_id', 'identity')
                   -> references('id')
                   -> on('identities');
            
            $table -> foreign('user_id', 'user')
                    -> references('id')
                    -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('santas', function (Blueprint $table) {

            $table -> dropForeign('from');
            $table -> dropForeign('to');
        });

        Schema::table('wishes', function (Blueprint $table) {

            $table -> dropForeign('author');
            $table -> dropForeign('target');
        });

        Schema::table('identity_user', function (Blueprint $table) {

            $table -> dropForeign('identity');
            $table -> dropForeign('user');
        });
    }
}
