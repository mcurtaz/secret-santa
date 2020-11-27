<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santas', function (Blueprint $table) {
            $table -> id();
            $table -> foreignId('from');
            $table -> foreignId('to');
            $table -> boolean('done') -> default(0);
            $table -> dateTime('done_at') -> nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santas');
    }
}
