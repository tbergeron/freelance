<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('name', 255);
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('pages');
    }
}