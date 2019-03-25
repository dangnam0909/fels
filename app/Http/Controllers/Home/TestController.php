<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB;
use Auth;
use App\Models\Result;
use Carbon\Carbon;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('tests.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions = $request->input('questions.*');
        $test = Test::find($request->input('test_id'));
        $score = 0;
        $options = [];

        foreach ($questions as $key => $question)
        {
            $options[$key] = $request->input('answers.'. $question) != null ? $request->input('answers.'. $question) : null;
        }

        $results = DB::table('options')->whereIn('id', $options)->get();
        foreach ($results as $result)
        {
            $score = $result->is_correct == 1 ? $score + 1 : $score;
        }

        $result = Result::create([
            'finish_time' => Carbon::now()->format('H:m:i'),
            'user_id' => Auth::user()->id,
            'test_id'=> $test->id,
            'score' => $score,
        ]);

        return view('tests.result', compact('result', 'test'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $test  = Test::findOrFail($id);
            $questions = $test->questions()->inRandomOrder()->limit(config('setting.question_number'))->get();

            return view('tests.show', compact('questions', 'test'));
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
