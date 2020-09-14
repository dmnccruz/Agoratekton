<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CallEvent;
use App\Events\CancelCall;
use App\Events\DeclineCall;
use App\Events\MeetingRoom;
use App\Events\StartMeeting;
use App\Events\EndMeeting;
use App\Events\AddNote;
use App\Events\SetMeeting;
use App\Events\DeclineRequest;
use App\Events\AcceptRequest;

class EventController extends Controller
{
    public function callEvent($id, $callerName, $callerId, $meetingId)
    {   
        $collection = collect([]);
        $collection->push($id);
        $collection->push($callerName);
        $collection->push($callerId);
        $collection->push($meetingId);
        event(new CallEvent($collection));
        return "Calling...";
    }

    public function cancelCall($id)
    {   
        $collection = collect([]);
        $collection->push($id);
        event(new CancelCall($collection));
        return "Dropping call...";
    }

    public function declineCall($id)
    {   
        $collection = collect([]);
        $collection->push($id);
        event(new DeclineCall($collection));
        return "Declining call...";
    }

    public function meetingRoom($meetingid, $callerId, $id)
    {   
        $collection = collect([]);
        $collection->push($meetingid);
        $collection->push($callerId);
        $collection->push($id);
        event(new MeetingRoom($collection));
        return "to Meeting room...";
    }

    public function startMeeting($id)
    {   
        $collection = collect([]);
        $collection->push($id);
        event(new StartMeeting($collection));
        return "Starting Meeting...";
    }

    public function endMeeting($id)
    {   
        $collection = collect([]);
        $collection->push($id);
        event(new EndMeeting($collection));
        return "Ending Meeting...";
    }

    public function addNote($id, $noteBody)
    {   
        $collection = collect([]);
        $collection->push($id);
        $collection->push($noteBody);
        event(new AddNote($collection));
        return "Adding Note...";
    }

    public function setMeeting($id, $recName, $callerId, $callerName, $dateInput, $topic, $callerAvatar)
    // public function setMeeting($id, $recName, $callerId, $callerName, $dateInput, $topic)
    {   
        $collection = collect([]);
        $collection->push($id);
        $collection->push($recName);
        $collection->push($callerId);
        $collection->push($callerName);
        $collection->push($dateInput);
        $collection->push($topic);
        $collection->push($callerAvatar);
        event(new SetMeeting($collection));
        return "Requesting Meeting";
    }

    public function declineRequest($id)
    {   
        $collection = collect([]);
        $collection->push($id);
        event(new DeclineRequest($collection));
        return "Request Declined";
    }

    public function acceptRequest($id)
    {   
        $collection = collect([]);
        $collection->push($id);
        event(new AcceptRequest($collection));
        return "Request accepted";
    }



}
