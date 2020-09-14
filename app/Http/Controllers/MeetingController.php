<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Pusher\Pusher;
use App\User;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{

    public function index($meetingid, $id) {
        $user = User::find($id);
        $meetingID = $meetingid;
        $callerMeetingId = DB::table('users')->where('meetingid', $meetingID)->first();
        return view('meeting-room', compact('user', 'meetingID', 'callerMeetingId'));
    }

    public function authenticate(Request $request) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher('420333140913464ba6be', 'fcc5dae853634c927f54', '1050820', [
            'cluster' => 'ap2',
            'encrypted' => true
        ]);

        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);

        return response($key);
    }
}
