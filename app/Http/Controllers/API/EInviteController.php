<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    EInvite
};

class EInviteController extends Controller
{
    public function all_einvite()
    {
        $all_einvite = EInvite::where(['status'=>1])->get();

         return response()->json([
            'status' => 200,
            'einvite' => $all_einvite
        ]);
    }

}
