<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMilestonesTable extends Migration {

	public function up()
	{
		Schema::create('milestones', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned();
			$table->string('name', 255);
            $table->text('description')->nullable();
            $table->timestamp('due_date')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('milestones');
	}
}