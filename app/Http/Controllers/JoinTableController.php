<?php

namespace App\Http\Controllers;

use App\Models\Quiz\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Country;
use App\State;
use App\City;
use App\App;
use App\Qquestion;

class JoinTableController extends Controller
{
    //
    public function index(){
        $data = Country::join('states', 'states.country_id', '=', 'countries.id')
            ->join('cities', 'cities.state_id', '=', 'states.id')
            ->get();

        //return view('table', compact('data'));
        return $data;
    }

    public function stateT(){
        $data = State::join('countries', 'states.country_id', '=', 'countries.id')
            ->get('countries.name', 'states.id');
        //return view('table', ['countries'=>$data]);
        return $data;
        //return Country::all();
    }

    public function countryT(){
        $data = Country::all();
        return view('table', ['countries'=>$data]);
        //return Country::all();
    }

    public function cityT(){
        $data = City::all();
    }

    public function selectCity(){
        return DB::select("select * from cities");
    }

    public function getApps(){
        $data = App::find(1)->getApptype;
        return $data;
    }

    public function getQuestions(){
        $data = Qquestion::all();
        return $data;
    }
}
