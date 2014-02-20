<?php

use Carbon\Carbon;

class MilestoneTableSeeder extends BaseSeeder {

	public function run()
	{
		//DB::table('milestones')->delete();

		// MilestoneTableSeeder
        for($i = 0; $i <= 10; $i++) {
            Milestone::create([
                'project_id' => rand(0, 5),
                'name' => parent::generateString(null, [1,3]),
                'due_date' => parent::generateRandomDate('2015-02-30', '2020-02-30'),
            ]);
        }
	}
}