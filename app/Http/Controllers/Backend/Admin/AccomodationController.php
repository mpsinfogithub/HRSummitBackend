<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Accomodation
};

class AccomodationController extends Controller
{
    public function all_accomodation()
    {
        $all_accomodation = Accomodation::all();

        return view("Backend/admin/all_accomodation",compact('all_accomodation'));
    }

    public function add_edit_accomodation($id='')
    {
        if($id > 0)
        {
            $res = Accomodation::find($id);
            $result['title'] = $res->title;
            $result['sub_title'] = $res->sub_title;
            $result['photo'] = $res->photo;
            $result['check_in'] = $res->check_in;
            $result['check_out'] = $res->check_out;
            $result['contact'] = $res->contact;
            $result['google_map'] = $res->google_map;
            $result['id'] = $id;
        }
        else
        {
            $result['title'] = '';
            $result['sub_title'] = '';
            $result['photo'] = '';
            $result['check_in'] = '';
            $result['check_out'] = '';
            $result['contact'] = '';
            $result['google_map'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_accomodation",$result);
    }

    public function add_edit_accomodation_process(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'contact' => 'required'
        ]);

        $id = $request->accomodation_id;

        if($id > 0)
        {
            $accomodation = Accomodation::find($id);
            $message = "Accomodation has been updated successfully";
        }
        else
        {
            $accomodation = new Accomodation();
            $message = "Accomodation has been added successfully";
        }   

        $accomodation->title = $request->title;
        $accomodation->sub_title = $request->sub_title;
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            if($id > 0)
            {
                //unlink('storage/uploads/Accomodation/'.$accomodation->photo);
            }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Accomodation/',$image_name);
            $accomodation->photo = $image_name;
        }

        $accomodation->check_in = $request->check_in;
        $accomodation->check_out = $request->check_out;
        $accomodation->contact = $request->contact;
        $accomodation->google_map = $request->google_map;

        $accomodation->save();

        return redirect('admin/all-accomodation')->with('success',$message);
    }

    public function change_accomodation_status($status,$id)
    {
        $accomodation = Accomodation::find($id);
        $accomodation->status = $status;
        $accomodation->save();

        return redirect('admin/all-accomodation')->with('success','Accomodation status has been changed successfully');
    }

    public function delete_accomodation($id)
    {
        $accomodation = Accomodation::find($id);

        //unlink('storage/uploads/Accomodation/'.$accomodation->photo);

        $accomodation->delete();

        return redirect('admin/all-accomodation')->with('success','Accomodation has been deleted successfully');
    }
}
