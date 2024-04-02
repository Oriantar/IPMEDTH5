<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\inbraakMelding;
use App\Models\sensorids;
use Carbon\Carbon;
class MeldingenController extends Controller
{
    //
    public function index(): View
    {
        $user = auth()->user();
        $inbraakmeldingen = inbraakMelding::where('user_id', $user->id)->get();
        $sensoren = sensorids::where('user_id', $user->id)->get();
        $user->last_login = $user->now_login;
        $user->now_login = Carbon::now()->toDateTimeString();
        $user->save(); 
        return view("Meldingen.index", ['inbraakmeldingen' => $inbraakmeldingen, 'sensoren' => $sensoren]);
    }
}
