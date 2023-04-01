<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    About,
    Accomodation,
    Minute,
    Setting,
    User
};
use App\Rules\MatchedOldPassword;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function about()
    {
        $about = About::find(1);

        return response()->json([
            'status' => 200,
            'about' => $about
        ]);
    }
    
    public function minute()
    {
        $minute = Minute::find(1);
        
        return response()->json([
            'status' => 200,
            'minute' => $minute
        ]);
    }
    
    public function home()
    {
        $account = Setting::find(1);
        
        return response()->json([
            'status' => 200,
            'home' => $account
        ]);
    }
    
    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'current_password' => ['required', new MatchedOldPassword($request->id)],
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'validation_errors' => $validator->messages()
            ]);
        }
        else
        {
            $user = User::find($request->id);
            $user->password = Crypt::encryptString($request->password);
            $user->save();

            return response()->json([
                'status' => 200,
                'message' => 'Password has been changed successfully'
            ]);
        }
    }
    
    public function update_profile_picture(Request $request)
    {
        $id = $request->id;
        
        $user = User::find($id);
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0 && isset($user->photo))
            // {
            //     unlink('storage/uploads/User/'.$user->photo);
            // }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Profile/',$image_name);
            $user->photo = $image_name;
            
            // $image = $request->photo;  // your base64 encoded
            // $image = str_replace('data:image/png;base64,', '', $image);
            // $image = str_replace(' ', '+', $image);
            // $imageName = Str::random(10).'.'.'png';
            // \File::put(storage_path(). '/app/public/uploads/Profile/' . $imageName, base64_decode($image));
            // $user->photo = $imageName;
        }
        
        $user->save();
        
        $user = User::find($id);
        
        return response()->json([
            'status' => 200,
            'photo' => $user->photo
        ]);

    }
}
