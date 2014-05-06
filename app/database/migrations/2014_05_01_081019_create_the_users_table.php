<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			//create the users table
            $table->increments('id');
            $table->text('email', 50);
            $table->text('username', 20);
            $table->text('password', 60);
            $table->text('password_temp', 60);
            $table->text('code', 60);

            $table->integer('active');

            $table->timestamps();

            $table->string('remember_token', 100)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        //destroy the users table
		Schema::drop('users');
	}

}
