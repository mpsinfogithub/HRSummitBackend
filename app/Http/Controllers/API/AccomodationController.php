<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
   Accomodation,
   User
};

class AccomodationController extends Controller
{
    public function get_accomodation($id)
    {
        $accomodation = Accomodation::join('users','users.accomodation_id','=','accomodations.id')
                        ->where(['users.id'=>$id])
                        ->get(['*','accomodations.photo as accomo_photo']);
        
        return response()->json([
            'status' => 200,
            'accomodation' => $accomodation
        ]);
    }

}
