<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Agenda,
    AgendaEvent
};
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function all_agenda()
    {
        $all_agenda = Agenda::all();

        return view("Backend/admin/all_agenda",compact('all_agenda'));
    }

    public function add_edit_agenda($id='')
    {
        if($id > 0)
        {
            $res = Agenda::find($id);
            $result['start_date'] = $res->start_date;
            $result['all_agenda'] = $res;
            $result['id'] = $id;
        }
        else
        {
            $result['start_date'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_agenda",$result);
    }

    public function add_edit_agenda_process(Request $request)
    {

        $request->validate([
            'start_date' => 'required'
        ]);

        $id = $request->agenda_id;

        if($id > 0)
        {
            $agenda = Agenda::find($id);
            $message = "Agenda has been updated successfully";
        }
        else
        {
            $agenda = new Agenda();
            $message = "Agenda has been added successfully";
        }   

        $agenda->start_date = $request->start_date;

        $agenda->save();

        $begin = $request->begin;
        $end = $request->end;
        $title = $request->title;
        $agenda_event_id = $request->agenda_event_id;

        foreach($begin as $key=>$val)
        {
            if($agenda_event_id[$key] > 0)
            {
                $agenda_event = AgendaEvent::find($agenda_event_id[$key]);
            }
            else
            {
                $agenda_event = new AgendaEvent();
            }

            $agenda_event->agenda_id = $agenda->id;
            $agenda_event->begin = $val;
            $agenda_event->end = $end[$key];
            $agenda_event->title = $title[$key];

            $agenda_event->save();            
        }

        return redirect('admin/all-agenda')->with('success',$message);
    }

    public function change_agenda_status($status,$id)
    {
        $agenda = Agenda::find($id);
        $agenda->status = $status;
        $agenda->save();

        return redirect('admin/all-agenda')->with('success','Agenda status has been changed successfully');
    }

    public function delete_agenda($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        return redirect('admin/all-agenda')->with('success','Agenda has been deleted successfully');
    }

    public function delete_agenda_event(Request $request)
    {
        $id = $request->id;

        $agenda_event = AgendaEvent::find($id);

        $agenda_event->delete();

        return response()->json([
            'message' => 'Agenda Event has been deleted successfully'
        ]);
    }
}
