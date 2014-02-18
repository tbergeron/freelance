<?php

use Carbon\Carbon;

class MilestoneTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('milestones')->delete();

		// MilestoneTableSeeder
		Milestone::create(array(
				'project_id' => 1,
				'name' => 'First Release',
                'due_date' => '2015-02-30',
			));
	}
}