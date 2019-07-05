<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use DataTables;
use App\QuizType;
use App\Quiz;
use App\Question;
use File;
use DB;

class QuestionController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($id)
  {
    $quiz = Quiz::find($id);
    return view('question.create', compact('quiz'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

  /*START OF API*/

  // public function api_index($id){
  //   $data = Question::where('quiz_id', $id)->get();
  //   foreach ($data as $key => $value) {
  //     if(!empty($value->pic_url)){
  //       $value->pic_url = asset('img/question/'.$value->pic_url.'');
  //     }
  //   }
  //   return response()->json([
  //     'status'=>'success',
  //     'user'=>$data
  //   ]);
  // }
  public function api_index($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        if(!empty($quiz)){
            $quiz = Question::where('quiz_id', $quiz->id)->get();
        } else {
          return response()->json([
              'status' => 'failed',
              'message'   => 'Quiz not found'
          ]);
        }
        $option  = [];
        foreach ($quiz as $key => $item) {
            $option[$key] = $item->answer()->orderBy('option', 'asc')->get();
        }
        $collection = [];
        foreach ($quiz as $i => $item) {
          $collection[$i] = [
            'id' => $item['id'],
            'question' => $item['question'],
            'pic_question' => $item['pic_url'],
            'a' => $option[$i]->get(0)->content,
            'pic_a' => $option[$i]->get(0)->pic_url,
            'b' => $option[$i]->get(1)->content,
            'pic_b' => $option[$i]->get(1)->pic_url,
            'c' => $option[$i]->get(2)->content,
            'pic_b' => $option[$i]->get(2)->pic_url,
            'd' => $option[$i]->get(3)->content,
            'pic_d' => $option[$i]->get(3)->pic_url,
            'e' => $option[$i]->get(4)->content,
            'pic_e' => $option[$i]->get(4)->pic_url,
            'isTrue' => $option[$i]->where('isTrue', 1)->first()->content.', '.$option[$i]->where('isTrue', 1)->first()->pic_url,
          ];
        }

        return response()->json([
            'error'  => false,
            'status' => 'success',
            'result'   => $collection
        ]);
    }

}

?>
