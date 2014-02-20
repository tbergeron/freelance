<?php

class BaseSeeder extends Seeder {

    public function generateString($needed_words = null, $random = null)
    {
        $words = '["in","quis","labore","anim","et","nulla","quis","velit","sint","velit","qui","anim","laborum","consectetur","aliqua","incididunt","consectetur","nulla","ex","exercitation","velit","fugiat","voluptate","consequat","veniam","enim","duis","labore","sunt","occaecat","veniam","consequat","irure","duis","mollit","reprehenderit","ex","sint","sunt","officia","voluptate","velit","in","officia","do","consequat","duis","tempor","nostrud","lorem","ex","dolor","eiusmod","in","aute","id","esse","reprehenderit","incididunt","ad","nostrud","cupidatat","non","esse","excepteur","do","aute","labore","ad","deserunt","deserunt","ut","deserunt","nisi","eiusmod","velit","voluptate","aliquip","irure","sit","minim","tempor","magna","ut","labore","adipisicing","ex","ipsum","consequat","amet","qui","ullamco","nostrud","veniam","consectetur","duis","aliqua","commodo","laborum","amet","mollit","ea","qui","officia","ullamco","adipisicing","Lorem","ipsum","excepteur","irure","sunt","magna","adipisicing","veniam","sint","veniam","proident","velit","quis","nisi","cupidatat","pariatur","excepteur","pariatur","velit","non","amet","officia","incididunt","et","veniam","laboris","deserunt","ullamco","labore","sint","do","eu","tempor","dolor","dolore","excepteur","commodo","reprehenderit","ea","velit","laboris","veniam","aute","dolor","sit","adipisicing","nostrud","minim","Lorem","occaecat","ipsum","excepteur","laboris","sint","dolor","deserunt","esse","enim","ex","velit","elit","fugiat","culpa","id","ex","quis","consequat","tempor","cupidatat","do","eiusmod","occaecat","qui","fugiat","tempor","officia","proident","nulla","fugiat","nostrud","quis","labore","laboris","exercitation","cupidatat","consectetur","nulla","ea","deserunt","labore","veniam","tempor","ad","est","nulla","ipsum","mollit","dolor","est","id","ex","elit","incididunt","consectetur","est","laboris","culpa","eu","labore","excepteur","exercitation","Lorem","laboris","adipisicing","commodo","nostrud","pariatur","tempor","ut","exercitation","et","fugiat","id","proident","veniam","consequat","laboris","labore","laborum","qui","velit","mollit","excepteur","nostrud","pariatur","consectetur","ullamco","velit","sunt","irure","irure","sunt","eiusmod","dolor","fugiat","labore","non","nulla","enim","velit","aliquip","labore","irure","elit","proident","ea","et","enim","nisi","aliquip","dolore","sunt","culpa","deserunt","nostrud","consectetur","do","officia","eiusmod","amet","sunt","veniam","aute","cupidatat","labore","cillum","in","enim","ut","ut","fugiat","ea","aute","pariatur","consectetur","sit","aliquip","qui","labore","esse","sint","velit","anim","sit","veniam","esse","ex","ad","minim","nostrud","voluptate","sint","velit","id","tempor","do","nostrud","aliquip","irure","Lorem","eu","proident","pariatur","irure","do","excepteur","fugiat","elit","excepteur","labore","anim","ea","dolor","tempor","adipisicing","ex","nulla","occaecat","eu","anim","commodo","eiusmod","cillum","officia","nisi","excepteur","anim","sunt","consectetur","anim","nisi","consectetur","pariatur","voluptate","est","enim","incididunt","cupidatat","ipsum","laborum","tempor","culpa","et","tempor","ad","nostrud","sit","dolore","incididunt","commodo","labore","officia","tempor","aliqua","proident","id","exercitation","duis","nulla","ad","proident","et","culpa","magna","sunt","ex","eiusmod","ut","veniam","Lorem","ut","adipisicing","dolore","labore","ex","Lorem","esse","ullamco","Lorem","ea","mollit","et","nulla","nulla","in","occaecat","Lorem","do","nulla","nostrud","est","anim","adipisicing","aliquip","magna","aliqua","aliqua","id","id","nostrud","ullamco","eiusmod","quis","enim","ullamco","ipsum","proident","voluptate","veniam","reprehenderit","dolor","cupidatat","reprehenderit","enim","eiusmod","ea","nisi","amet","velit","quis","eu","Lorem","laborum","commodo","aliqua","enim","dolor","enim","ut","labore","veniam","proident","dolore","cupidatat","dolor","dolor","consequat","enim","in","occaecat","do","esse","culpa","minim","irure","eu","nostrud","incididunt","pariatur","mollit","laboris","minim","tempor","dolore","amet","deserunt","officia","Lorem","duis","incididunt","occaecat","incididunt","deserunt","qui","ea","elit","exercitation","irure","aliqua","aliqua","minim","duis","commodo","ipsum","id","in","cupidatat","in","ut","elit","cillum","laborum","id","exercitation","ipsum","cillum","aliqua","ut","tempor","cillum","Lorem","consequat","eu","sint","dolor","occaecat","anim","dolore","amet","reprehenderit","labore","reprehenderit","dolore","id","commodo","reprehenderit","consequat","deserunt","mollit","ea","anim","excepteur","dolor","culpa","aliquip","ex","fugiat","pariatur","consectetur","eu","in","reprehenderit","proident","Lorem","duis","laboris","amet","exercitation","occaecat","ea","nostrud","aliqua","ea","tempor","consectetur","occaecat","magna","cillum","ex","irure","exercitation","id","elit","sit","veniam","elit","occaecat","cupidatat","irure","ipsum","adipisicing","minim","in","adipisicing"]';
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