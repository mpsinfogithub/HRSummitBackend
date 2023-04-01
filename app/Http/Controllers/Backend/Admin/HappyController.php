<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Happy,
    HappyDetail
};
use Illuminate\Http\Request;

class HappyController extends Controller
{
    public function all_happy()
    {
        $all_happy = Happy::orderBy('id','desc')->get();

        return view("Backend/admin/all_happy",compact('all_happy'));
    }

    public function add_edit_happy($id='')
    {
        if($id > 0)
        {
            $res = Happy::find($id);
            $result['title'] = $res->title;
            $result['all_happy'] = $res;
            $result['id'] = $id;
        }
        else
        {
            $result['title'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_happy",$result);
    }

    public function add_edit_happy_process(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);

        $id = $request->happy_id;

        if($id > 0)
        {
            $happy = Happy::find($id);
            $message = "Happy has been updated successfully";
        }
        else
        {
            $happy = new Happy();
            $message = "Happy has been added successfully";
        }   

        $happy->title = $request->title;

        $happy->save();

        $name = $request->name;
        $phone = $request->phone;
        $happy_detail_id = $request->happy_detail_id;

        foreach($name as $key=>$val)
        {
            if($happy_detail_id[$key] > 0)
            {
                $happy_detail = HappyDetail::find($happy_detail_id[$key]);
            }
            else
            {
                $happy_detail = new HappyDetail();
            }

            $happy_detail->happy_id = $happy->id;
            $happy_detail->name = $val;
            $happy_detail->phone = $phone[$key];

            $happy_detail->save();            
        }

        return redirect('admin/all-happy')->with('success',$message);
    }

    public function change_happy_status($status,$id)
    {
        $happy = Happy::find($id);
        $happy->status = $status;
        $happy->save();

        return redirect('admin/all-happy')->with('success','Happy status has been changed successfully');
    }

    public function delete_happy($id)
    {
        $happy = Happy::find($id);
        $happy->delete();

        return redirect('admin/all-happy')->with('success','Happy has been deleted successfully');
    }

    public function delete_happy_detail(Request $request)
    {
        $id = $request->id;

        $happy_detail = HappyDetail::find($id);

        $happy_detail->delete();

        return response()->json([
            'message' => 'Happy Detail has been deleted successfully'
        ]);
    }
}
