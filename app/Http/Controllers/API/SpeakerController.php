<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Speaker
};

class SpeakerController extends Controller
{
    public function all_speaker()
    {
        $all_speaker = Speaker::where(['status'=>1])->get();

        return response()->json([
            'status' => 200,
            'all_speaker' => $all_speaker
        ]);
    }
    
    public function view(Speaker $speaker)
    {
        return response()->json([
            'status' => 200,
            'speaker' => $speaker
        ]);
    }
}
