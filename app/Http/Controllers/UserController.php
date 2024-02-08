<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function ViewUser(){
        $data['users'] = UserInfo::all();
        return view('backend.user.view_user',$data);
    }

    public function AddUser(){
        return view('backend.user.add_user');
    }

    public function StoreUser(Request $request){

        $validateData = $request->validate([
            'name'   => 'required|max:255',
            'email'  => 'required|unique:users,email',
            'mobile' => 'required|unique:user_infos,mobile'
        ]);

        DB::transaction(function() use($request){

            $user = new User();
            $user->name     = $request->name;
            $user->password = Hash::make($request->password);
            $user->email    = $request->email;

            $user->save();

            $user_info = new UserInfo();
            $user_info->job_title  = $request->job_title;
            $user_info->user_id    = $user->id;
            $user_info->company    = $request->company;
            $user_info->mobile     = $request->mobile;
            $user_info->dob        = empty($request->dob)? null : date('Y-m-d',strtotime($request->dob));
            $user_info->address    = $request->address;
            $user_info->note       = $request->note;
            $user_info->added_by   = Auth::user()->id;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'),$filename);
                $user_info['image'] = $filename;
            }

            $user_info->save();
        });

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//end method


    public function EditUser($user_id){

        $data['editData'] = UserInfo::with('user')->where('user_id',$user_id)->first();
        //dd($data['editData']->toArray());
        return view('backend.user.edit_user',$data);
    }


    public function UpdateUser(Request $request,$user_id){

        DB::transaction(function() use($request,$user_id){
            $user = User::where('id',$user_id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $user_info = UserInfo::where('user_id',$user_id)->first();

            //dd($user_info->toArray());

            $user_info->job_title  = $request->job_title;
            $user_info->company    = $request->company;
            $user_info->mobile     = $request->mobile;
            $user_info->dob        = empty($request->dob)? null : date('Y-m-d',strtotime($request->dob));
            $user_info->address    = $request->address;
            $user_info->note       = $request->note;
            $user_info->updated_by = Auth::user()->id;

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'),$filename);
                $user_info['image'] = $filename;
            }
            $user_info->save();

        });

        $notification = array(
            'message'    => 'User Updated Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->route('view.user')->with($notification);

    }//End Method

    public function DeleteUser($user_id){
        DB::transaction(function() use($user_id){

            //dd($user_id);
            $user = User::where('id',$user_id)->first();
            $user->delete();

            $user_info = UserInfo::where('user_id',$user_id)->first();
            if ($user_info->image != null){
                @unlink(public_path('upload/user_images/'.$user_info->image));
            }

            $user_info->delete();

        });

        $notification = array(
            'message'    => 'User Delete Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->route('view.user')->with($notification);

    }//End Method






}
