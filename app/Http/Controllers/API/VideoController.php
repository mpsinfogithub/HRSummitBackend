<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Video
};

class VideoController extends Controller
{
    public function all_video()
    {
        $all_video = Video::where(['status'=>1])->get();

        return response()->json([
            'status' => 200,
            'all_video' => $all_video
        ]);
    }

}
