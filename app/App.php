<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class App extends Model
{
    function getAppType(){
        return $this ->hasMany('App\Apptype');
    }
}
