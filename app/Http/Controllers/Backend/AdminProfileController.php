<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminProfileController extends Controller
{
    public function AdminProfile(){

        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));        

    }
    public function AdminProfileEdit(){
        $aditData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('aditData'));        
    
    }

    public function AdminStoreUpdate(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('/uploads/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
    
    public function adminChangePassword(){
        return view('admin.admin_change_password');
    }

    public function adminUpdatePassword(Request $request){
        // old_password password password_confirmation
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            // Auth::logout();
            $notification = array(
                'message' => 'Password Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error! Sorry your password cound not be updated',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
  
    
    
}
