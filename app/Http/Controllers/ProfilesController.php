<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);

        return view('home', [
            'user' => $user,

        ]);
    }

    public function setTimeline()
    {
        $startTime = \Carbon\Carbon::createFromFormat('H:i a', '08:00 AM');
        $endTime = \Carbon\Carbon::createFromFormat('H:i a', '07:00 PM');
        $currentTime = \Carbon\Carbon::now();

        if($currentTime->between($startTime, $endTime, true)){
            dd('In Between');
        }else{
            dd('In Not Between');
        }

        ///////////////////

        $ttt = Carbon::now()->setTimezone('Europe/Bucharest')->format('H:i:s');
        $time = Carbon::now()->format('H:i:s');
        $t = Carbon::now()->toDateTimeString();
        //$future = $time->add(new DateInterval('P20Y'));
        //DB::table('payments')->insert(['user_id'=>1,'start_sub_date'=>$time, 'end_sub_date'=>$time]);


        //DB::insert('insert into payments ( user_id, start_sub_date, end_sub_date) values ($user->id, now(), now())');

        $pay = DB::select('select * from payments');

        dd($ttt);
        //dd($time);
    }
}
