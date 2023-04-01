<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Deligate,
    DeligateDetail
};
use Illuminate\Http\Request;

class DeligateController extends Controller
{
    public function all_deligate()
    {
        $all_deligate = Deligate::all();

        return view("Backend/admin/all_deligate",compact('all_deligate'));
    }

    public function add_edit_deligate($id='')
    {
        if($id > 0)
        {
            $res = Deligate::find($id);
            $result['deligate_name'] = $res->name;
            $result['photo'] = $res->photo;
            $result['all_deligate'] = $res;
            $result['id'] = $id;
        }
        else
        {
            $result['deligate_name'] = '';
            $result['photo'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_deligate",$result);
    }

    public function add_edit_deligate_process(Request $request)
    {

        $id = $request->deligate_id;

        if($id > 0)
        {
            $deligate = Deligate::find($id);
            $message = "Deligate has been updated successfully";
        }
        else
        {
            $deligate = new Deligate();
            $message = "Deligate has been added successfully";
        }   

        $deligate->name = $request->deligate_name;
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0)
            // {
            //     unlink('storage/uploads/Gallery/'.$deligate->photo);
            // }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $deligate->photo = $image_name;
        }

        $deligate->save();

        $name = $request->name;
        $company = $request->company;
        $designation = $request->designation;
        $email = $request->email;
        $phone = $request->phone;
        $deligate_detail_id = $request->deligate_detail_id;

        foreach($name as $key=>$val)
        {
            if($deligate_detail_id[$key] > 0)
            {
                $deligate_detail = DeligateDetail::find($deligate_detail_id[$key]);
            }
            else
            {
                $deligate_detail = new DeligateDetail();
            }

            $deligate_detail->deligate_id = $deligate->id;
            $deligate_detail->name = $val;
            $deligate_detail->company = $company[$key];
            $deligate_detail->designation = $designation[$key];
            $deligate_detail->email = $email[$key];
            $deligate_detail->phone = $phone[$key];

            $deligate_detail->save();            
        }

        return redirect('admin/all-deligate')->with('success',$message);
    }

    public function change_deligate_status($status,$id)
    {
        $deligate = Deligate::find($id);
        $deligate->status = $status;
        $deligate->save();

        return redirect('admin/all-deligate')->with('success','Deligate status has been changed successfully');
    }

    public function delete_deligate($id)
    {
        $deligate = Deligate::find($id);
        $deligate->delete();

        return redirect('admin/all-deligate')->with('success','Deligate has been deleted successfully');
    }

    public function delete_deligate_detail(Request $request)
    {
        $id = $request->id;

        $deligate_detail = DeligateDetail::find($id);

        $deligate_detail->delete();

        return response()->json([
            'message' => 'Deligate Detail has been deleted successfully'
        ]);
    }
}
