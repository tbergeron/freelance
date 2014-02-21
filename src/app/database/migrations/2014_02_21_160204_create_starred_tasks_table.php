<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarredTasksTable extends Migration {

	public function up()
	{
		Schema::create('starred_tasks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('task_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('starred_tasks');
	}
}