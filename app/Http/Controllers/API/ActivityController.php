<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Activity,
    ActivityEvent
};

class ActivityController extends Controller
{
    public function all_activity()
    {
        
        $allactivity = Activity::where(['status'=>1])->get();
        $result = [];
        $i = 0;
        
        foreach($allactivity as $row){
            $result[$i][0] = $row->title;
            $result[$i++][1] = $row->activity_event;
        }        

        return response()->json([
            'status' => 200,
            'activity' => $result
        ]);
    }

}
