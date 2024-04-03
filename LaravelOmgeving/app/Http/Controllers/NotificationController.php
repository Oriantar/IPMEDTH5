<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $notification = Notification::first();
        if($notification->notification){
            $notification->notification = 0;
        }
        else{
            $notification->notification = 1;
        }
        $notification->save();
        return redirect("instellingen");
    }
}
