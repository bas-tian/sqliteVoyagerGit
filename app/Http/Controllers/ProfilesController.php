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

    public function setTimeline($data)
    {

        $today = Carbon::today();
        $todayDate = $today->format('Y-m-d H:i:s');
        $endDate = $today->addMonths(6)->format('Y-m-d H:i:s');

        DB::table('payments')->insert(['user_id'=>1,'start_sub_date'=>$todayDate, 'end_sub_date'=>$endDate]);

        $pay = DB::select('select * from payments');

        dd($pay);

        $startTime = \Carbon\Carbon::createFromFormat('H:i a', '08:00 AM');
        $endTime = \Carbon\Carbon::createFromFormat('H:i a', '07:00 PM');
        $currentTime = \Carbon\Carbon::now();

        if($currentTime->between($startTime, $endTime, true)){
            dd('In Between');
        }else{
            dd('In Not Between');
        }

        ///////////////////
        $t = Carbon::now()->toDateTimeString();
        //$future = $time->add(new DateInterval('P20Y'));
        //DB::table('payments')->insert(['user_id'=>1,'start_sub_date'=>$time, 'end_sub_date'=>$time]);


        //DB::insert('insert into payments ( user_id, start_sub_date, end_sub_date) values ($user->id, now(), now())');

        $pay = DB::select('select * from payments');

        dd($ttt);
        //dd($time);
    }
}
