<?php

class BaseSeeder extends Seeder {

    public function generateString($needed_words = null, $random = null)
    {
        $words = '["in","quis","labore","anim","et","nulla","quis","velit","sint","velit","qui","anim","laborum","consectetur","aliqua","incididunt","consectetur","nulla","ex","exercitation","velit","fugiat","voluptate","consequat","veniam","enim","duis","labore","sunt","occaecat","veniam","consequat","irure","duis","mollit","reprehenderit","ex","sint","sunt","officia","voluptate","velit","in","officia","consequat","duis","tempor","nostrud","lorem","ex","dolor","eiusmod","in","aute","id","esse","reprehenderit","incididunt","ad","nostrud","cupidatat","non","esse","excepteur","aute","labore","ad","deserunt","deserunt","ut","deserunt","nisi","eiusmod","velit","voluptate","aliquip","irure","sit","minim","tempor","magna","ut","labore","adipisicing","ex","ipsum","consequat","amet","qui","ullamco","nostrud","veniam","consectetur","duis","aliqua","commodo","laborum","amet","mollit","ea","qui","officia","ullamco","adipisicing","Lorem","ipsum","excepteur","irure","sunt","magna","adipisicing","veniam","sint","veniam","proident","velit","quis","nisi","cupidatat","pariatur","excepteur","pariatur","velit","non","amet","officia","incididunt","et","veniam","laboris","deserunt","ullamco","labore","sint"]';
        $words_array = json_decode($words);
        $number_of_words = ($needed_words) ? $needed_words : rand(3, 10);
        $sentence = '';

        if ($random) {
            $number_of_words = rand($random[0], $random[1]);
        }

        for($i = 0; $i < $number_of_words; $i++) {
            $sentence = $sentence . ' ' . $words_array[rand(0, count($words_array)-1)];
        }

        // Trim & Capitalize
        $sentence = ucfirst(trim($sentence));

        return $sentence;
    }

    public function generateRandomDate($start_date, $end_date)
    {
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d H:i:s', $val);
    }


}