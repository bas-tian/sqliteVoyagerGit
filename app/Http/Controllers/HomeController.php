<?php

namespace App\Http\Controllers;

use App\Models\Completedquestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->id;
        //$comQuestions = Completedquestion::where('user_id', $user);
        $comQuestions = Completedquestion::all();

        //dd($comQuestions);
        return view('main', compact('comQuestions'));
    }
    public function midd()
    {
        return view('mid');
    }
}
