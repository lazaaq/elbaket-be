<?php

namespace App\Http\Controllers;

use App\Material;
use App\QuizCollager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{

    public function api_index() {
        //
    }

    public function api_show($quiz_type_id) {
        $user = Auth::user();

        $material = Material::with('media', 'module', 'quiz', 'quiztype.quizCategory')->find($quiz_type_id);
        $materials = Material::where('quiz_type_id', $material['quiz_type_id'])->get()->sortBy('id');

        $histories = QuizCollager::with('answerSave')
                                ->where('quiz_id', $material->quiz->id)
                                ->where('collager_id', $user->collager->id)
                                ->get();

        $leaderboards = QuizCollager::with('collager.user')
                                    ->get()
                                    ->sortByDesc('score');

        $material['materials'] = $materials;
        $material['quiz']['histories'] = $histories;
        $material['quiz']['leaderboards'] = $leaderboards;
        return responseAPI(200, true, $material);
    }
    
    public function api_store(Request $request) {
        //
    }

    public function api_update(Request $request, $id) {
        //
    }

    public function api_destroy($id) {
        //
    }
}
