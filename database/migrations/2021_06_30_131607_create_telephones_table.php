<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelephonesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('telephones', function (Blueprint $table) {
            $table->id();
            $table->string('telephone');
            $table->timestamps();
            
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('telephones');

        //$table->dropForeign('telephones_user_id_foreign');
    }
}
