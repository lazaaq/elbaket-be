<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use App\Lecture;
use App\Collager;
use App\School;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);

        $admin = User::create([
            'name'      => 'Developer',
            'email'     => 'developer@dev.com',
            'password'  =>  bcrypt('devpass'),
            'picture'   => 'avatar.png'
        ]);
        $admin->assignRole('admin');

        $teacher = User::create([
            'name'      => 'Teacher Dev',
            'email'     => 'teacher@dev.com',
            'password'  =>  bcrypt('devpass'),
            'picture'   => 'avatar.png'
        ]);
        $teacher->assignRole('teacher');
        Lecture::create([
           'user_id' => $teacher->id,
        ]);

        $student = User::create([
            'name'      => 'Student Dev',
            'email'     => 'student@dev.com',
            'password'  =>  bcrypt('devpass'),
            'picture'   => 'avatar.png'
        ]);
        $student->assignRole('student');
        Collager::create([
           'user_id' => $student->id,
        ]);

        $this->call(QuizCategorysTableSeeder::class);
        $this->call(QuizTypesTableSeeder::class);
        $this->call(QuizsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(QuizTemporaryTableSeeder::class);
        $this->call(HistoryTableSeeder::class);

        // custom
        School::find(123)->update([
            'category' => 'SMA'
        ]);
    }
}
