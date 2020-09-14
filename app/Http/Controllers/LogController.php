<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function loginn($id)
    {
        $user = User::find($id);
        $user->active_status = 1;

        $user->save();

        return ('youre active status is now true.');
    }

    public function logoutt($id)
    {
        $user = User::find($id);
        $user->active_status = 0;

        $user->save();

        // return ('youre active status is now false.');

        // return redirect('/logout');
        // Auth::logout();

        // return redirect('/login');
    }
}
