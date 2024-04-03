<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index(){
        $alarm = Alarm::first();
        if($alarm->alarm === 1){
            $alarm->alarm = 0;
        }
        else{
            $alarm->alarm = 1;
        }
        $alarm->save();
        return redirect("instellingen");
}
}
