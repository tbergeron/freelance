<?php

class ProjectTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('projects')->delete();

		// ProjectTableSeeder
		Project::create(array(
				'name' => 'Freelance Project Manager',
				'code' => 'FREE'
			));
	}
}