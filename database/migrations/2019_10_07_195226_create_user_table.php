<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 45);
            $table->string('cpf', 45);
            $table->string('phone', 45)->nullable();
            $table->string('email', 45);
            $table->string('password', 200);
            $table->boolean('active');
            $table->boolean('admin');
            $table->string('cellPhone', 45);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
