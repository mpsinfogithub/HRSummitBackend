<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Leader
};

class LeaderController extends Controller
{
    public function all_leader()
    {
        $all_leader = Leader::where(['status'=>1])->get();

        return response()->json([
            'status' => 200,
            'all_leader' => $all_leader
        ]);
    }
    
    public function view(Leader $leader)
    {
        return response()->json([
            'status' => 200,
            'leader' => $leader
        ]);
    }
}
