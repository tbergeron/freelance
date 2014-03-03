<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarredProjectsTable extends Migration {

    public function up()
    {
        Schema::create('starred_projects', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('starred_projects');
    }
}