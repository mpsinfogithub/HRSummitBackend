<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function all_video()
    {
        $all_video = Video::orderBy('id','desc')->get();

        return view("Backend/admin/all_video",compact('all_video'));
    }

    public function add_edit_video($id='')
    {
        if($id > 0)
        {
            $res = Video::find($id);
            $result['thumbnail'] = $res->thumbnail;
            $result['video'] = $res->video;
            $result['id'] = $id;
        }
        else
        {
            $result['thumbnail'] = '';
            $result['video'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_video",$result);
    }

    public function add_edit_video_process(Request $request)
    {
        $id = $request->video_id;

        if($id > 0)
        {
            $video = Video::find($id);
            $message = "Video has been updated successfully";
        }
        else
        {
            $video = new Video();
            $message = "Video has been added successfully";
        }   
        
        if($request->hasFile('thumbnail'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0 && isset($video->thumbnail))
            // {
            //     unlink('storage/uploads/Gallery/'.$video->thumbnail);
            // }
            $image = $request->file('thumbnail');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $video->thumbnail = $image_name;
        }

        if($request->hasFile('video'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0 && isset($video->video))
            // {
            //     unlink('storage/uploads/Gallery/'.$video->video);
            // }
            $video_file = $request->file('video');
            $ext = $video_file->extension();
            $video_name = $rand.'.'.$ext;
            $video_file->storeAs('/public/uploads/Gallery/',$video_name);
            $video->video = $video_name;
        }

        $video->save();

        return redirect('admin/all-video')->with('success',$message);
    }

    public function change_video_status($status,$id)
    {
        $video = Video::find($id);
        $video->status = $status;
        $video->save();

        return redirect('admin/all-video')->with('success','Video status has been changed successfully');
    }

    public function delete_video(Video $video)
    {
        $video->delete();

        return redirect('admin/all-video')->with('success','Video has been deleted successfully');
    }
}
