<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{

    public function api_index() {
        //
    }

    public function api_show($quiz_type_id) {
        $material = Material::with('media', 'module', 'quiz', 'quiztype.quizCategory')->find($quiz_type_id);
        $materials = Material::where('quiz_type_id', $material['quiz_type_id'])->get()->sortBy('id');
        $material['materials'] = $materials;
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
