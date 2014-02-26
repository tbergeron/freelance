<?php

class PageTableSeeder extends BaseSeeder {

    public function run()
    {
        //DB::table('pages')->delete();

        // PageTableSeeder
        for($i = 0; $i <= 10; $i++) {
            Page::create([
                'project_id' => rand(0, 5),
                'name' => parent::generateString(null, [1,3]),
                'content' => '<p><strong>Hello World</strong></p>'
            ]);
        }
    }
}