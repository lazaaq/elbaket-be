<?php

use App\QuizType;
use Illuminate\Database\Seeder;

class QuizTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $categories = array('Elbaket');
        $types = array('Bahasa Korea Level Dasar', 'Bahasa Korea Level 1', 'Bahasa Korea Level 2', 'Bahasa Korea Level 3');
        for($i=0; $i<count($categories); $i++) {
            for($j=0; $j<count($types); $j++) { // tingkat kota, provinsi, nasional
                QuizType::create([
                    'quiz_category_id' => ($i+1),
                    'name' => $types[$j],
                    'description' => $types[$j],
                    'pic_url' => $types[$j] . '.png',
                    'created_by' => 1
                ]);
            }
        }
    }
}