<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    About,
    Minute,
    Setting,
    User
};
use Illuminate\Http\Request;
use App\Rules\MatchedOldPassword;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function about()
    {
        $about = About::find(1);

        return view("Backend/admin/about",compact('about'));
    }

    public function add_edit_about_process(Request $request)
    {
        $about = About::find(1);  
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            if(isset($about->photo))
            {
                //unlink('storage/uploads/Gallery/'.$gallery->photo);
            }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $about->photo = $image_name;
        }
        
        $about->des = $request->des_about;

        $about->save();

        return redirect('admin/about')->with('success','About has been updated successfully');
    }

    public function minute()
    {
        $minute = Minute::find(1);

        return view("Backend/admin/minute",compact('minute'));
    }

    public function add_edit_minute_process(Request $request)
    {
        $minute = Minute::find(1);  
        
        $minute->title = $request->title;
        $minute->summit_date = $request->summit_date;
        $minute->venue = $request->venue;
        $minute->des = $request->des_minute;

        $minute->save();

        return redirect('admin/minute')->with('success','Minute has been updated successfully');
    }
    
    public function account()
    {
        $account = Setting::find(1);
        
        return view("Backend/admin/account",compact('account'));
    }
    
    public function account_process(Request $request)
    {
        $request->validate([
            'no_of_hr_summit' => 'required',
            'place_name' => 'required',
            'wp_link' => 'required',
            'agenda_title' => 'required'
        ]);
        
        $account = Setting::find(1);
        $account->no_of_hr_summit = $request->no_of_hr_summit;
        $account->place_name = $request->place_name;
        $account->whatsapp_community_link = $request->wp_link;
        $account->agenda_title = $request->agenda_title;
        $account->minute_status = $request->minute_status;
        
        if($request->hasFile('app_logo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0)
            // {
            //     unlink('storage/uploads/Gallery/'.$gallery->photo);
            // }
            $image = $request->file('app_logo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $account->app_logo = $image_name;
        }
        
        if($request->hasFile('host_logo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0)
            // {
            //     unlink('storage/uploads/Gallery/'.$gallery->photo);
            // }
            $image = $request->file('host_logo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Gallery/',$image_name);
            $account->host_logo = $image_name;
        }
        
        // if($request->hasFile('profile_pic')){
        //     $profile_image = rand().'.'.$request->profile_pic->extension();
        //     $request->file('profile_pic')->move(public_path('uploads/Profile/'), $profile_image);
        //     $user->profile_pic = $profile_image;
        // }
        
        $account->save();
        
        return redirect('admin/account')->with('success','Account has been updated successfully');
    }
    
    function change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchedOldPassword],
            'new_password' => 'required|min:8',
            'retype_new_password' => 'required|same:new_password|min:8'
        ]);
        
        $user = User::find(1);
        $user->password = Crypt::encryptString($request->password);
        $user->save();
        
       return redirect('admin/account')->with('success','Password has been changed successfully');
    }
}
