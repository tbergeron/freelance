<?php

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        Project::create([
            'code' => 'PROJ',
            'name' => 'Project Name'
        ]);

    }
}