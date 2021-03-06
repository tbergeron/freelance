<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
        Schema::table('tasks', function(Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('pages', function(Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('task_id')->references('id')->on('tasks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('milestones', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('starred_tasks', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('starred_tasks', function(Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('starred_projects', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('starred_projects', function(Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('permissions', function(Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('permissions', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

	public function down()
	{
        Schema::table('tasks', function(Blueprint $table) {
            $table->dropForeign('tasks_project_id_foreign');
        });
        Schema::table('pages', function(Blueprint $table) {
            $table->dropForeign('pages_project_id_foreign');
        });
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_user_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_task_id_foreign');
		});
		Schema::table('milestones', function(Blueprint $table) {
			$table->dropForeign('milestones_project_id_foreign');
		});
        Schema::table('starred_tasks', function(Blueprint $table) {
            $table->dropForeign('starred_tasks_user_id_foreign');
        });
        Schema::table('starred_tasks', function(Blueprint $table) {
            $table->dropForeign('starred_tasks_task_id_foreign');
        });
        Schema::table('starred_projects', function(Blueprint $table) {
            $table->dropForeign('starred_projects_user_id_foreign');
        });
        Schema::table('starred_projects', function(Blueprint $table) {
            $table->dropForeign('starred_projects_task_id_foreign');
        });
        Schema::table('permissions', function(Blueprint $table) {
            $table->dropForeign('permissions_project_id_foreign');
        });
        Schema::table('permissions', function(Blueprint $table) {
            $table->dropForeign('permissions_user_id_foreign');
        });
	}
}