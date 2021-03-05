<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotificationChannels\WebPush\PushSubscription;
use App\Notifications\NotificationTest;
use Log;

use App\Models\User;

class NotifyController extends Controller
{

    public function notify(Request $request)
    {
        // Find user to notify
        $user = User::findOrFail($request->userId);


        // get message or set to default
        $msg = $request->message ?? 'OH NO! You forgot to add a message to the notification.';

        Log::info('notify user ' . $user->id . ' with message ' . $msg);
        $user->notify(new NotificationTest($request->message));

        return response('Notification created, sending based on service worker setup and production run in frontend.', 200);
    }    
}
