<?php

class TaskTableSeeder extends BaseSeeder {

	public function run()
	{
		//DB::table('tasks')->delete();

		// TaskTableSeeder
        $tasks_total = rand(100, 200);

        for($i = 0; $i <= $tasks_total; $i++) {
            Task::create(array(
                    'project_id' => rand(1, 5),
                    'milestone_id' => rand(0, 10),
                    'user_id' => 1,
                    'name' => parent::generateString(),
                    'description' => 'Man, lots of work!',
                    'is_closed' => (rand(0,1)) ? true : false,
                ));
        }
	}

}