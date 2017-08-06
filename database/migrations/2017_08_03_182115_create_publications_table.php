<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger ('id_user');
            $table->string('title');
            $table->text('description');
            $table->double('price');
            $table->tinyInteger('id_house');
            $table->string('url_file');
            $table->boolean('verified')->default(false);
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
         Schema::dropIfExists('publications');
    }
}
