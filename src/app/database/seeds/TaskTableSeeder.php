<?php

class TaskTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('tasks')->delete();

		// TaskTableSeeder
		Task::create(array(
				'project_id' => 1,
				'milestone_id' => 1,
				'user_id' => 1,
				'name' => 'Develop the whole damn thing',
				'description' => 'Man, lots of work!',
			));
	}
}