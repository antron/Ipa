<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpaOct4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipa_oct4s', function (Blueprint $table) {
            $table->string('bits')->unique();
            $table->bigInteger('value');
            $table->string('descript');
            $table->tinyInteger('status');
            $table->morphs('element');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipa_oct4s');
    }
}
