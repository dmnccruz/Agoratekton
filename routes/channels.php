<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('callChannel.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('callChannelCancel.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('callChannelDecline.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('callChannelMeeting.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('callChannelstartMeeting.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('callChannelendMeeting.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('addNoteMeeting.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('meetChannel.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('declineRequestChannel.{id}', function ($user, $id) {
    return $user->id === intval($id);
});

Broadcast::channel('acceptRequestChannel.{id}', function ($user, $id) {
    return $user->id === intval($id);
});



