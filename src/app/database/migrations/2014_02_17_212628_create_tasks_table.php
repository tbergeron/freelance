<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned();
			$table->integer('milestone_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
            $table->string('name', 255);
			$table->text('description');
			$table->boolean('is_closed')->default(false);
			$table->timestamps();
		});
	}

    // TODO: Add states/open/close to this migration

	public function down()
	{
		Schema::drop('tasks');
	}
}