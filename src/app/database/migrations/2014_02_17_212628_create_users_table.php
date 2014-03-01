<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->string('full_name', 255);
            $table->boolean('is_admin')->default(false);
            $table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}