<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{
    Happy
};
use Illuminate\Http\Request;

class HappyController extends Controller
{
    public function all_happy()
    {
        $all_happy = Happy::where(['status'=>1])->get();
        $result = [];
        $i = 0;
        foreach($all_happy as $row)
        {
            $result[$i][0] = $row->title;
            $result[$i++][1] = $row->happy_detail;
        }

        return response()->json([
            'status' => 200,
            'all_happy' => $result
        ]);
    }    
}
