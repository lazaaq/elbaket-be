<?php

use App\QuizCategory;
use Illuminate\Database\Seeder;

class QuizCategorysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $categories = array('Elbaket');
        for($i=0; $i<count($categories); $i++) {
            QuizCategory::create([
                'name' => $categories[$i],
                'description' => $categories[$i],
                'pic_url' => $categories[$i] . '.png',
                'pic_url_2' => $categories[$i] . '.png',
                'created_by' => 1,
                'created_at' => '2019-12-18 11:19:40',
                'updated_at' => '2019-12-18 11:19:40',
                'deleted_at' => NULL,
            ]);
        }
    }
}