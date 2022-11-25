<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingCountroller extends Controller
{
    public function addMeeting(Request $request)
    {
        $meeting = new Meeting;
        $meeting->user_id = $request->user_id;
        $meeting->name = $request->name;
        $meeting->location = $request->location;
        $meeting->latitude = $request->latitude;
        $meeting->longitude = $request->longitude;
        $meeting->meeting_time = $request->meeting_time;
        $meeting->date = $request->date;
        $meeting->save();

        return back()->with('success', 'Meeting schedule with client successfully added!');
    }
}
