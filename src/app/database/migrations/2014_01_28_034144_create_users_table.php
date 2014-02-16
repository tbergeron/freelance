<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function ($table) {
			$table->increments('id');

			$table->string('username', 16)->unique();
			$table->string('password', 64);
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('email')->unique();
            $table->boolean('is_admin')->default(false);

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
		Schema::drop('users');
	}

}