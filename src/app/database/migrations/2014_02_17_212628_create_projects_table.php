<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('code', 32)->unique();
            $table->text('description')->nullable();
            $table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('projects');
	}
}