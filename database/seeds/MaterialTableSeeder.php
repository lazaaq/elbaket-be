<?php

use App\Material;
use App\MaterialMedia;
use App\MaterialModule;
use App\Quiz;
use App\QuizType;
use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizTypes = QuizType::with('quiz')->get();
        $countQuizTypes = count($quizTypes);

        $materialsName = array(
            "1과 Bab 1",
            "2과 Bab 2",
            "3과 Bab 3",
            "4과 Bab 4"
        );
        $materialsDescription = array(
            array(
                "Huruf Korea '한글'",
                "Angka Korea '숫자'",
                "Struktur & Penanda Fungsi Kalimat Bahasa Korea"
            ),
            array(
                "나의 방 Kamar Ku",
                "일함생활 Kegiatan Sehari-Hari",
                "위치 Letak",
                "시장 (물건 사기) Pasar (Membeli Barang)"
            ),
            array(
                "모임 Pertemuan",
                "편지 Surat",
                "건강 Kesehatan",
                "여행 Liburan"
            ),
            array(
                "유학생활 Kehidupan Mahasiswa Asing",
                "세계 여행 Liburan",
                "실수 Kesalahan",
                "성격과 외모 Sifat Dan Penampilan"
            )
        );

        for($i=0; $i<$countQuizTypes; $i++) {
            for($j=0; $j<count($materialsDescription[$i]); $j++) {
                $material = Material::create([
                    'quiz_type_id' => $i + 1,
                    'quiz_id' => 1,
                    'name' => $materialsName[$j],
                    'description' => $materialsDescription[$i][$j],
                ]);
                
                MaterialModule::create([
                    'material_id' => $material->id,
                    'name' => 'Module name for ' . $material->name . ($j + 1),
                    'description' => 'Module description for ' . $material->description,
                    'file_url' => 'https://www.figma.com/file/p6X6yb5tiSE6ozQiupig6s/Solve-Web-2',
                ]);
                
                MaterialMedia::create([
                    'material_id' => $material->id,
                    'name' => 'Media name for ' . $material->name . ($j + 1),
                    'description' => 'Media description for ' . $material->description,
                    'video_url' => 'https://youtube.com',
                ]);
            }
        }
    }
}
