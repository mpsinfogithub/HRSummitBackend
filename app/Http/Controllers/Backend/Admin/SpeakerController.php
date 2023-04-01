<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function all_speaker()
    {
        $all_speaker = Speaker::all();

        return view("Backend/admin/all_speaker",compact('all_speaker'));
    }

    public function add_edit_speaker($id='')
    {
        if($id > 0)
        {
            $res = Speaker::find($id);
            $result['name'] = $res->name;
            $result['photo'] = $res->photo;
            $result['designation'] = $res->designation;
            $result['des'] = $res->des;
            $result['id'] = $id;
        }
        else
        {
            $result['name'] = '';
            $result['photo'] = '';
            $result['designation'] = '';
            $result['des'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_speaker",$result);
    }

    public function add_edit_speaker_process(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'des' => 'required'
        ]);

        $id = $request->speaker_id;

        if($id > 0)
        {
            $speaker = Speaker::find($id);
            $message = "Speaker has been updated successfully";
        }
        else
        {
            $speaker = new Speaker();
            $message = "Speaker has been added successfully";
        }   

        $speaker->name = $request->name;
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0)
            // {
            //     unlink('storage/uploads/Speaker/'.$speaker->photo);
            // }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Speaker/',$image_name);
            $speaker->photo = $image_name;
        }

        $speaker->designation = $request->designation;
        $speaker->des = $request->des;

        $speaker->save();

        return redirect('admin/all-speaker')->with('success',$message);
    }

    public function change_speaker_status($status,$id)
    {
        $speaker = Speaker::find($id);
        $speaker->status = $status;
        $speaker->save();

        return redirect('admin/all-speaker')->with('success','Speaker status has been changed successfully');
    }

    public function delete_speaker($id)
    {
        $speaker = Speaker::find($id);

        //unlink('storage/uploads/Speaker/'.$speaker->photo);

        $speaker->delete();

        return redirect('admin/all-speaker')->with('success','Speaker has been deleted successfully');
    }
}
