<?php

namespace App\Http\Controllers;

use App\Models\Completedquestion;
use Illuminate\Support\Facades\DB;
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

        $getDate = DB::select('select * from payments where user_id = ?', [$user]);
        $result = $getDate[0]->end_sub_date;
        $fullDate = explode(" ", $result);
        $endDate = $fullDate[0];

        //$res = DB::getSchemaBuilder()->getColumnListing('payments');
        //$comQuestions = Completedquestion::where('user_id', $user);

        $comQuestions = Completedquestion::all();

        return view('main', compact('comQuestions', 'endDate'));
    }
    public function midd()
    {
        return view('mid');
    }
}
