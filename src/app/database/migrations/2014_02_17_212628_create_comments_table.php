<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('task_id')->unsigned();
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}