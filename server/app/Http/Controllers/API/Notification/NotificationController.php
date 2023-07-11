<?php

namespace App\Http\Controllers\API\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Rent;
// use Illuminate\Support\Facades\Auth;

// use Auth;
// $user_id = Auth::user()->id;


class NotificationController extends Controller
{
    public function myNotifications()
    {
        $customer = auth()->user()->customer;
        $posts = $customer->notifications()->get();
        // $notifications = Notification::where('user_id',$user_id)->get();
        return $this->json($posts);
    }
}
