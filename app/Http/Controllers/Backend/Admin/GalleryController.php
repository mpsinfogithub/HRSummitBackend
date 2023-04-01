<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function all_gallery()
    {
        $all_gallery = Gallery::orderBy('id','desc')->get();

        return view("Backend/admin/all_gallery",compact('all_gallery'));
    }

    public function add_edit_gallery($id='')
    {
        if($id > 0)
        {
            $res = Gallery::find($id);
            $result['photo'] = $res->photo;
            $result['type'] = $res->type;
            $result['id'] = $id;
        }
        else
        {
            $result['photo'] = '';
            $result['type'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_gallery",$result);
    }

    public function add_edit_gallery_process(Request $request)
    {
        $id = $request->gallery_id;

        if($id > 0)
        {
            $gallery = Gallery::find($id);
            $message = "Gallery has been updated successfully";
        }
        else
        {
            $gallery = new Gallery();
            $message = "Gallery has been added successfully";
        }   
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0 && isset($gallery->photo))
            // {
            //     unlink('storage/uploads/Gallery/'.$gallery->photo);
            // }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $gallery->photo = $image_name;
        }

        $gallery->type = $request->type;

        $gallery->save();

        return redirect('admin/all-gallery')->with('success',$message);
    }

    public function change_gallery_status($status,$id)
    {
        $gallery = Gallery::find($id);
        $gallery->status = $status;
        $gallery->save();

        return redirect('admin/all-gallery')->with('success','Gallery status has been changed successfully');
    }

    public function delete_gallery($id)
    {
        $gallery = Gallery::find($id);

        // if(isset($gallery->photo))
        // {
        //     unlink('storage/uploads/Gallery/'.$gallery->photo);
        // }

        $gallery->delete();

        return redirect('admin/all-gallery')->with('success','Gallery has been deleted successfully');
    }
}
