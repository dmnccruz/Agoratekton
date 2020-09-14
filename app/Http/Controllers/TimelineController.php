<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Meeting;
use App\Post;
use App\Message;


class TimelineController extends Controller
{
    public function index()
    {
        $users = User::all();
        $meetings = Meeting::all();
        $posts = Post::all();
        $messages = Message::all();

        dd($users);

        return view('timeline', compact('users', 'meetings', 'posts', 'messages'));
    }

}
