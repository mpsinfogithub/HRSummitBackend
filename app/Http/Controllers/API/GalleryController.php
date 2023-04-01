<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Gallery
};

class GalleryController extends Controller
{
    public function all_gallery()
    {
        $all_gallery = Gallery::where(['status'=>1,'type'=>'gallery'])->get();

        return response()->json([
            'status' => 200,
            'all_gallery' => $all_gallery
        ]);
    }
    
    public function all_carousel()
    {
        $all_carousel = Gallery::where(['status'=>1,'type'=>'carousel'])->get();

        return response()->json([
            'status' => 200,
            'all_carousel' => $all_carousel
        ]);
    }

    public function all_sponsor()
    {
        $all_sponsor = Gallery::where(['status'=>1,'type'=>'sponsor'])->get();

        return response()->json([
            'status' => 200,
            'all_sponsor' => $all_sponsor
        ]);
    }
}
