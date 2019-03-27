<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Word;
use App\Models\User;
use Auth;
use DB;
use Carbon\Carbon;
use Exception;
use App\Models\Lesson;

class WordListController extends Controller
{
	public function show($id)
    {
        $lesson = Lesson::whereId($id)->first();
        $word = $lesson->words()->inRandomOrder()->limit(config('setting.word.number_page'))->get();

        return view('words.index', compact('lesson', 'word'));
    }

	public function create()
	{
		//
	}

    public function doFavorite(Request $request)
    {
        try {
            $user = Auth::user();
            $word_id = DB::table('memories')
                ->whereWordId($request->id)
                ->whereUserId($user->id)
                ->exists();

            if (!$word_id) {
                $user->words()->attach($request->id, [
                    'status' => config('setting.true'),
                    'user_id' => $user->id,
                    'learn_time' => Carbon::now(),
                ]);

                return redirect()->back();
            } else {
                $word_status = DB::table('memories')->whereWordId($request->id)->whereUserId($user->id)->whereStatus(config('setting.true'))->exists();
                if ($word_status) {
                    $user->words()->updateExistingPivot($request->id, ['status' => config('setting.false')]);
                } else {
                    $user->words()->updateExistingPivot($request->id, ['status' => config('setting.true')]);
                }

                return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('status', trans('word.add_error'));
        }
    }

    public function reviewWord()
    {
        $user = Auth::user();
        $words = $user->words()->latest()->paginate(config('setting.word.number_page'));

        return view('words.review', compact('words'));
    }
}
