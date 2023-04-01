<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function all_feedback()
    {
        $all_feedback = Feedback::all();

        return view("Backend/admin/all_feedback",compact('all_feedback'));
    }

    public function view_feedback(Feedback $feedback)
    {
        return view("Backend/admin/view_feedback",compact('feedback'));
    }

    public function change_feedback_status($status,Feedback $feedback)
    {
        $feedback->status = $status;
        $feedback->save();

        return redirect('admin/all-feedback')->with('success','Feedback status has been changed successfully');
    }

    public function delete_feedback(Feedback $feedback)
    {

        $feedback->delete();

        return redirect('admin/all-feedback')->with('success','Feedback has been deleted successfully');
    }
}
