<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('n_id')->unique();
            $table->tinyInteger('t_id');
            $table->date('DOB');
            $table->string('email')->unique();
            $table->string('cellphone')->unique();
            $table->tinyInteger('gender');
            $table->tinyInteger('id_city');
            $table->text('address');
            $table->string('url_user')->nullable();
            $table->string('url_front')->nullable();
            $table->string('url_back')->nullable();
            $table->string('password');
            $table->tinyInteger('level')->default('1');
            $table->tinyInteger('status')->default('1');
            $table->boolean('verified')->default(false);
            $table->tinyInteger('publication')->default('0');
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
