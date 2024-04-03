<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Notification;
use App\Models\Alarm;
class InstellingenController extends Controller
{
    public function index(): View
    {
        $alarm = Alarm::first();
        $notification = Notification::first();
        return view("Instellingen.index", ['alarm' => $alarm, 'notification'=> $notification]);
    }
}
