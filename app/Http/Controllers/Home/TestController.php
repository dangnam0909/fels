<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use Carbon\Carbon;
use App\Repositories\TestRepository;
use App\Repositories\ResultRepository;
use App\Repositories\OptionRepository;

class TestController extends Controller
{
    protected $test;

    protected $result;

    protected $option;

    public function __construct(TestRepository $test, ResultRepository $result, OptionRepository $option)
    {
        $this->test = $test;
        $this->result = $result;
        $this->option = $option;
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
        $test = $this->test->find($request->input('test_id'));
        $score = $this->test->calculateScore($questions, $this->option, $request);
        $result = $this->result->create([
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
