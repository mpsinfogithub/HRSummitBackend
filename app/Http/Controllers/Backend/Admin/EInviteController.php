<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    EInvite
};
use Illuminate\Http\Request;

class EInviteController extends Controller
{
    public function all_einvite()
    {
        $all_einvite = EInvite::all();

        return view("Backend/admin/all_einvite",compact('all_einvite'));
    }

    public function add_edit_einvite($id='')
    {
        if($id > 0)
        {
            $res = EInvite::find($id);
            $result['des'] = $res->des;
            $result['photo'] = $res->photo;
            $result['event_date'] = $res->event_date;
            $result['id'] = $id;
        }
        else
        {
            $result['des'] = '';
            $result['photo'] = '';
            $result['event_date'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_einvite",$result);
    }

    public function add_edit_einvite_process(Request $request)
    {

        $request->validate([
            'des' => 'required',
            'event_date' => 'required'
         ]);

        $id = $request->einvite_id;

        if($id > 0)
        {
            $einvite = EInvite::find($id);
            $message = "EInvite has been updated successfully";
        }
        else
        {
            $einvite = new EInvite();
            $message = "EInvite has been added successfully";
        }   

        $einvite->des = $request->des;
        $einvite->event_date = $request->event_date;        

        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            if($id > 0)
            {
                //unlink('storage/uploads/Gallery/'.$gallery->photo);
            }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $einvite->photo = $image_name;
        }

        $einvite->save();

        return redirect('admin/all-einvite')->with('success',$message);
    }

    public function change_einvite_status($status,$id)
    {
        $einvite = EInvite::find($id);
        $einvite->status = $status;
        $einvite->save();

        return redirect('admin/all-einvite')->with('success','EInvite status has been changed successfully');
    }

    public function delete_einvite($id)
    {
        $einvite = EInvite::find($id);
        $einvite->delete();

        return redirect('admin/all-einvite')->with('success','EInvite has been deleted successfully');
    }
    
}
