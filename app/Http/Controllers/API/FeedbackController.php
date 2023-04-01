<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Feedback
};

class FeedbackController extends Controller
{
    public function add_edit_feedback_process(Request $request)
    {
        $feedback = new Feedback();
        $feedback->user_id = $request->user_id;
        $feedback->message = $request->message;
        $feedback->save();
        
        return response()->json([
            'status' => 200,
            'message' => 'Feedback has been added successfully'
        ]);
    }
    
    public function all_feedback()
    {
        $feedback = Feedback::with('user')->get();
        
        return response()->json([
            'status' => 200,
            'feedback' => $feedback
        ]);
    }
}
