<?php

class MilestoneTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('milestones')->delete();

		// MilestoneTableSeeder
		Milestone::create(array(
				'project_id' => 1,
				'name' => 'First Release'
			));
	}
}