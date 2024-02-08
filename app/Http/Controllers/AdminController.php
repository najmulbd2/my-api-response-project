<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //
    public function Logout(){
        Auth::logout();
        return redirect('login');
    }

    public function AddInfo(){
        return view('backend.my_info.add_info');
    }

    public function StoreInfo(Request $request){


            $user = new Post();

            $user->name        = $request->name;
            $user->designation = $request->designation;
            $user->mobile      = $request->mobile;
            $user->address     = $request->address;

            $user->save();


        $notification = array(
            'message' => 'Info Inserted Successfully',
            'alert-type' => 'success'

        );
        return Redirect::back()->with($notification);
    }








}
