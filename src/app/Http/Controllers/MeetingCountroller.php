<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use Illuminate\Support\Facades\DB;

class MeetingCountroller extends Controller
{
    public function addMeeting(Request $request)
    {
        $minutes = Meeting::select(DB::raw("SUM(meeting_time) as total_time"))->where(['user_id'=>$request->user_id,'date'=>$request->date])->get();
        $currentUserMinute = 9 * 60;

        if ($minutes[0]['total_time'] >= $currentUserMinute)
        {
            return back()->with('error', 'On this date' . $request->date . 'all schedules are busy');
        } elseif (($minutes[0]['total_time'] + $request->time) > $currentUserMinute)
        {
            return back()->with('error', 'On this date' . $request->date . 'you have only' . $currentUserMinute . 'minutes');
        } else {
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
}
