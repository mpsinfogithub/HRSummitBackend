<?php

namespace App\Http\Controllers\ApI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    User
};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|digits:10',
            'password' => 'required'
        ]);

        $user = new User();
        $message = "Thank you for your registration";
        
        if($validator->fails())
        {
            return response()->json([
                'validation_errors' => $validator->messages()
            ]);
        }
        else
        {
            $user->name = $request->name;
            $user->email = $request->email;
            
            if($request->hasFile('photo'))
            {
                $rand = rand('111111111','999999999');
                if($id > 0)
                {
                    unlink('storage/uploads/User/'.$user->photo);
                }
                $image = $request->file('photo');
                $ext = $image->extension();
                $image_name = $rand.'.'.$ext;
                $image->storeAs('/public/uploads/User/',$image_name);
                $user->photo = $image_name;
            }

            $user->phone = $request->phone;
            $user->role = 'guest';
            $user->password = Crypt::encryptString($request->password);

            $user->save();

            return response()->json([
                'status' => 200,
                'message' => $message
            ]);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:191',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'validation_errors' => $validator->messages()
            ]);
        }
        else
        {
            $email = $request->email;
            $password = $request->password;

            $user = User::where('email', $request->email)->first();
            $validPassword = false;

            $validPassword = $request->password == Crypt::decryptString($user->password) ? true : false;

            if(! isset($user->email) || ! $validPassword || ! $user->status) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid Credentials'
                ]);
            }
            else
            {   
                
                session()->put('user_id',$user->id);
                session()->save();
                
                $token = $user->createToken($user->email.'_GuestToken',['server:guest'])->plainTextToken;

                return response()->json([
                    'status' => 200,
                    'name' => $user->name,
                    'username' => $user->email,
                    'token' => $token,
                    'user_id' => $user->id,
                    'message' => 'Logged In Successfully',
                    'role' => $user->role,
                    'photo' => $user->photo
                ]);
            }
        }
    }

    public function login_user()
    {
        return "sdsd";
    }
    
    public function update_notification_token(Request $request)
    {
        $user_id = $request->user_id;
        $token = $request->token;
        $user = User::find($user_id);
        $user->notification_token = $token;
        $user->save();
        
        return response()->json([
            'status' => 200,
            'message' => 'Token updated successfully'
        ]);
    }
}
