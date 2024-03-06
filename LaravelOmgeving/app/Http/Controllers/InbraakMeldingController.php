<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sensorids;
use App\Models\inbraakMelding;


class InbraakMeldingController extends Controller
{
    //elke keer als ik een id binnenkrijg gooi ik een nieuwe melding met timestamp in de database.
    
    public function index(Request $id){

        $inbraakMelding = new inbraakMelding;
        
        if($id->segment(3) == null){
            if(str_contains($id->segment(2), "bs-") || str_contains($id->segment(2), "c-")){
            $inbraakMelding->sensor_id = $id->segment(2);
            $inbraakMelding->save();}
        }
        return redirect('/');


    }

}
