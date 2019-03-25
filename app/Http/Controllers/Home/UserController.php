<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {

            return redirect()->to('user/profile/' . Auth::user()->id);
        }

        return redirect()->to('/login');
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
        //
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
            $user = User::where('id', $id)->firstOrFail();

            return view('users.profile', compact('user'));
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
        try {
            $input = $request->except(['email', 'role_id']);
            $user = User::query()->findOrFail($id);
            $this->authorize('update', $user);
            $user->update($input);

            return redirect()->back()->with('status', trans('profile.update_success'));
        } catch (ModelNotFoundException $e) {

            return redirect()->back()->with('status', trans('profile.update_error'));
        }
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

    /**
     * Display the following users list.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function following($id)
    {
        $user = User::query()->where('id', $id)->first();

        if(!isset($user))
            return view('errors.404');

        $followings = $user->followings()->get();

        return view('users.following', compact('followings'));
    }
}
