<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sensorids;
use App\Models\inbraakMelding;


class InbraakMeldingController extends Controller
{

    public function index(Request $request)
    {
        $sensorId = $request->segment(2); 
        $camera = $request->url;
        

        $sensor = sensorids::where('sensorid', $sensorId)->first();
    
        
        if ($sensor) {
            $inbraakMelding = new inbraakMelding;
            $inbraakMelding->sensor_id = $sensorId;
            $inbraakMelding->user_id = $sensor->user_id;
            $inbraakMelding->save();
        }
        if($camera == $inbraakMelding->sensor_id->camerabeeld)continue;
        else{
            $inbraakMelding->sensor_id->camerabeeld = $camera
        }
        return redirect('/');
    }
    

}
