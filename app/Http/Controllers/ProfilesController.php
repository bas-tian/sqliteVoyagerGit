<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        $uId = Auth::user()->id;

        $today = Carbon::today();
        $startDate = $today->format('Y-m-d H:i:s');
        $endDate = $today->addMonths($data)->format('Y-m-d H:i:s');

        $record = DB::table('payments')->where('user_id', $uId)->first();

        //dd($record);

        if($record){
            DB::table('payments') ->where('user_id', $uId) ->limit(1) ->update( [ 'start_sub_date' => $startDate, 'end_sub_date' => $endDate ]);
        }else{
            DB::table('payments')->insert(['user_id'=>$uId,'start_sub_date'=>$startDate, 'end_sub_date'=>$endDate]);
        }

        $pay = DB::select('select * from payments');

        //dd($pay);

        ///////////////////
        //$res = DB::getSchemaBuilder()->getColumnListing('payments');
        //DB::table('payments')->delete();

    }
}
