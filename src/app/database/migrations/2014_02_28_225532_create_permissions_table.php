<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration {

    public function up()
    {
        Schema::create('permissions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->boolean('read')->default(false);
            $table->boolean('write')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('permissions');
    }
}