<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Activity,
    ActivityEvent
};
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function all_activity()
    {
        $all_activity = Activity::orderBy('id','desc')->get();

        return view("Backend/admin/all_activity",compact('all_activity'));
    }

    public function add_edit_activity($id='')
    {
        if($id > 0)
        {
            $res = Activity::find($id);
            $result['title'] = $res->title;
            $result['activity_date'] = $res->activity_date;
            $result['all_activity'] = $res;
            $result['id'] = $id;
        }
        else
        {
            $result['title'] = '';
            $result['activity_date']  = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_activity",$result);
    }

    public function add_edit_activity_process(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'activity_date' => 'required'
        ]);

        $id = $request->activity_id;

        if($id > 0)
        {
            $activity = Activity::find($id);
            $message = "Activity has been updated successfully";
        }
        else
        {
            $activity = new Activity();
            $message = "Ativity has been added successfully";
        }   

        $activity->title = $request->title;

        $activity->save();

        $begin = $request->begin;
        $end = $request->end;
        $activity_title = $request->activity_title;
        $activity_event_id = $request->activity_event_id;
        $activity_date = $request->activity_date;

        foreach($begin as $key=>$val)
        {
            if($activity_event_id[$key] > 0)
            {
                $activity_event = ActivityEvent::find($activity_event_id[$key]);
            }
            else
            {
                $activity_event = new ActivityEvent();
            }

            $activity_event->activity_id = $activity->id;
            $activity_event->begin = $val;
            $activity_event->end = $end[$key];
            $activity_event->title = $activity_title[$key];
            $activity_event->activity_date = $activity_date[$key];

            $activity_event->save();            
        }

        return redirect('admin/all-activity')->with('success',$message);
    }

    public function change_activity_status($status,$id)
    {
        $activity = Activity::find($id);
        $activity->status = $status;
        $activity->save();

        return redirect('admin/all-activity')->with('success','Activity status has been changed successfully');
    }

    public function delete_activity($id)
    {
        $activity = Activity::find($id);
        $activity->delete();

        return redirect('admin/all-activity')->with('success','Activity has been deleted successfully');
    }

    public function delete_activity_event(Request $request)
    {
        $id = $request->id;

        $activity_event = ActivityEvent::find($id);

        $activity_event->delete();

        return response()->json([
            'message' => 'Activity Event has been deleted successfully'
        ]);
    }
}
