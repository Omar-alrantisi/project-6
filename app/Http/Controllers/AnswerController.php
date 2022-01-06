<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Question;
use App\Models\Result;
use App\Models\Exam;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers=Answer::all();
        $questions=Question::all();
        return view('dashboard.manage_answer',compact('answers','questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.manage_answer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {
        $this->validate($request,[
            'name'=>'required|max:250',
            'correct'=>'required|max:250',


          ]);

          Answer::create([
              "name"=>$request->name,
              "correct"=>$request->correct,
              "question_id"=>$request->question,


         ]);
         return redirect()->back();
    }

    public function public_store(StoreAnswerRequest $request, $id)
    {
       

      $user_score=0;
      $total_score=0; 
      $is_pass=0;
     foreach ($request->except('_token') as $input_question_id => $user_answer) {

        $questions=Question::all();
        foreach($questions as $question){

           if ($input_question_id === $question->id){
             $total_score += $question->mark;

            if ($user_answer == 1 ){
               $user_score += $question->mark;

        };
             }

        }
    }
        Result::create([
            'result'              =>$user_score,
            'user_id'             =>auth()->user()->id,
            'exam_id'             =>$id,
            
            // 'question_id'         =>$input_question_id
         ]);

         
         $select_exam=Exam::find($id);
        //  $max_questions=$select_exam->number_of_questions;
        //  $user_answers = Answer::where('exam_id',$id)->where('user_id',auth()->user()->id)->get();
    
    // Result::create([
    //          'result'             =>$user_score_per_question,
    //          'exam_id'             =>$id,
    //          'user_id'             =>auth()->user()->id,
    // ]);

        if($user_score >= $total_score/2){
            $is_pass=1;
        };

        $exams   = Exam::all();
        $results = Result::where('user_id',auth()->user()->id)->get();
     return view('public_site.result',compact('user_score','total_score','questions','user_answer','is_pass', 'select_exam' , 'results','exams' ));
     
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer=Answer::find($id);
        $questions=Question::all();
        return view('dashboard.updates.answer_update',compact('answer','questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswerRequest  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, $id)
    {
        $answer=Answer::find($id);

        $answer->name=$request->name;
        $answer->correct=$request->correct;
        $answer->question_id=$request->question;

        $answer->update();
        return redirect()->route('answer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer=Answer::find($id);
        $answer->destroy($id);

        return redirect()->route('answer.index');
    }
}
