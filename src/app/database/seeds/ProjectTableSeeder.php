<?php

class ProjectTableSeeder extends BaseSeeder {

	public function run()
	{
		//DB::table('projects')->delete();

		// ProjectTableSeeder
        for($i = 0; $i <= 5; $i++) {
            $name = parent::generateString(null, [1,3]);
            $code = strtok($name, ' ');

            Project::create([
                'name' => $name,
                'code' => $code
            ]);
        }
	}
}