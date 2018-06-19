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
            $table->string('username',16)->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->string('avatar_path')->nullable();
            $table->unsignedTinyInteger('confirmed')->default(0);
            $table->string('confirmation_token',64);
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
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
