<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\{
    User,
    Accomodation,
    Setting
};

class AuthController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view("Backend/admin/login",compact('setting'));
    }

    public function auth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $request->email)->first();
        $validPassword = false;

        $validPassword = $request->password == Crypt::decryptString($user->password) ? true : false;

        if(! isset($user->email) || ! $validPassword || ! $user->status) {
            return redirect("admin")->with("error","Invalid Credentials");
        }
        else
        {
            $setting = Setting::find(1);
            
            $request->session()->put([
                'user_id'  => $user->id,
                'name'  => $user->name,
                'email'  => $user->email,
                'role' => $user->role,
                'app_logo' => $setting->app_logo
            ]);
            return redirect("admin/dashboard");
        }
    }

    public function dashboard()
    {
        return view("Backend/admin/dashboard");
    }

    public function all_user()
    {
        $all_user = User::where(['role'=>'guest'])->get();

        return view("Backend/admin/all_user",compact('all_user'));
    }

    public function add_edit_user($id='')
    {
        if($id > 0)
        {
            $res = User::find($id);
            $result['name'] = $res->name;
            $result['email'] = $res->email;
            $result['phone'] = $res->phone;
            $result['password'] = Crypt::decryptString($res->password);
            $result['photo'] = $res->photo;
            $result['accomodation_id'] = $res->accomodation_id;
            $result['room_no'] = $res->room_no;
            $result['id'] = $id;
        }
        else
        {
            $result['name'] = '';
            $result['email'] = '';
            $result['phone'] = '';
            $result['password'] = '';
            $result['photo'] = '';
            $result['accomodation_id'] = '';
            $result['room_no'] = '';
            $result['id'] = 0;
        }
        
        $result['accomodation'] = Accomodation::where(['status'=>1])->get();

        return view("Backend/admin/add_edit_user",$result);
    }

    public function add_edit_user_process(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|digits:10',
            'password' => 'required'
        ]);

        $id = $request->user_id;

        if($id > 0)
        {
            $user = User::find($id);
            $message = "User has been updated successfully";
        }
        else
        {
            $user = new User();
            $message = "User has been added successfully";
        }   

        $user->name = $request->name;
        $user->email = $request->email;
        
        if($request->hasFile('photo'))
        {
            $rand = rand('111111111','999999999');
            // if($id > 0)
            // {
            //     unlink('storage/uploads/User/'.$user->photo);
            // }
            $image = $request->file('photo');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/User/',$image_name);
            $user->photo = $image_name;
        }

        $user->phone = $request->phone;
        $user->accomodation_id = $request->accomodation_id;
        $user->room_no = $request->room_no;
        $user->password = Crypt::encryptString($request->password);

        $user->save();

        return redirect('admin/all-user')->with('success',$message);
    }

    public function change_user_status($status,$id)
    {
        $user = User::find($id);
        $user->status = $status;
        $user->save();

        return redirect('admin/all-user')->with('success','User status has been changed successfully');
    }

    public function delete_user($id)
    {
        $user = User::find($id);

        //unlink('storage/uploads/User/'.$user->photo);

        $user->delete();

        return redirect('admin/all-user')->with('success','User has been deleted successfully');
    }
}
