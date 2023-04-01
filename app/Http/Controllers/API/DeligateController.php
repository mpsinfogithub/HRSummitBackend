<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Deligate,
    DeligateDetail
};

class DeligateController extends Controller
{
    public function all_deligate()
    {
        $all_deligate = Deligate::where(['status'=>1])->get();

        return response()->json([
            'status' => 200,
            'all_deligate' => $all_deligate
        ]);
    }
    
    public function view(Deligate $deligate)
    {
        return response()->json([
            'status' => 200,
            'deligate_detail' => $deligate->deligate_detail
        ]);
    }
}
