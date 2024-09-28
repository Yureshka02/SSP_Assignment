<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomeMailNotification;
use App\Notifications\WelcomeSystemNotification;

class NotificationController extends Controller
{
    public function index()
    {


        $user=(new User())->first();

        $user->notify(new WelcomeMailNotification());

        $user->notify(new WelcomeSystemNotification());




        return view('notification');
    }
}
