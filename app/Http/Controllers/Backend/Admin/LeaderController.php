<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function all_leader()
    {
        $all_leader = Leader::all();

        return view("Backend/admin/all_leader",compact('all_leader'));
    }

    public function add_edit_leader($id='')
    {
        if($id > 0)
        {
            $res = Leader::find($id);
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

        return view("Backend/admin/add_edit_leader",$result);
    }

    public function add_edit_leader_process(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'des' => 'required'
        ]);

        $id = $request->leader_id;

        if($id > 0)
        {
            $leader = Leader::find($id);
            $message = "Leader has been updated successfully";
        }
        else
        {
            $leader = new Leader();
            $message = "Leader has been added successfully";
        }   

        $leader->name = $request->name;
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0)
            // {
            //     unlink('storage/uploads/Gallery/'.$leader->photo);
            // }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $leader->photo = $image_name;
        }

        $leader->designation = $request->designation;
        $leader->des = $request->des;

        $leader->save();

        return redirect('admin/all-leader')->with('success',$message);
    }

    public function change_leader_status($status,$id)
    {
        $leader = Leader::find($id);
        $leader->status = $status;
        $leader->save();

        return redirect('admin/all-leader')->with('success','Leader status has been changed successfully');
    }

    public function delete_leader($id)
    {
        $leader = Leader::find($id);

        //unlink('storage/uploads/Gallery/'.$leader->photo);

        $leader->delete();

        return redirect('admin/all-leader')->with('success','Leader has been deleted successfully');
    }
}
