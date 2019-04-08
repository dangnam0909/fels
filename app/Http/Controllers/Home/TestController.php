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
use App\Repositories\TestRepository;

class TestController extends Controller
{
    protected $test;

    public function __construct(TestRepository $test)
    {
        $this->test = $test;
    }
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
            'finish_time' => Carbon::now()->toTimeString(),
            'user_id' => Auth::user()->id,
            'test_id'=> $test->id,
            'score' => $score,
        ]);

        return redirect()->route('result.show', $result->id);
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
            $test  = $this->test->getById($id);
            $questions = $this->test->randomOrder($test, config('setting.question_number'));

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
