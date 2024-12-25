<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    function send(){
        $admin = User::find(1);
        $admin->notify(new NewOrderNotification('ali','T-Shirt',150));

        // Sending notification to multiple admins
        // $admins = User::where('type', 'admin')->get();
        // Notification::send($admins, new NewOrderNotification());
        return "Notification Sent";
    }
}
