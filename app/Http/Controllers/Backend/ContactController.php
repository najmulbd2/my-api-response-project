<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\UserInfo;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    public function ViewContact(){
        $data['contacts'] = Contact::all();
        return view('backend.contact.view_contact', $data);

    }

    public function AddContact(){
        return view('backend.contact.add_contact');
    }

    public function StoreContact(Request $request){
        $validateData = $request->validate([
            'name'   => 'required|max:255',
            'email'  => 'required|unique:contacts,email',
            'mobile' => 'required|unique:contacts,mobile'
        ]);

//        dd($request->dob);


        $data = new Contact();
        $data->name       = $request->name;
        $data->job_title  = $request->job_title;
        $data->company    = $request->company;
        $data->email      = $request->email;
        $data->mobile     = $request->mobile;
        $data->dob        = empty($request->dob)? null : date('Y-m-d',strtotime($request->dob));
        $data->address    = $request->address;
        $data->note       = $request->note;
        $data->added_by   = Auth::user()->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/contact_images'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Contact Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);



    }

    public function EditContact($id){
        $data['editData'] = Contact::find($id);

        return view('backend.contact.edit_contact',$data);

    }

    public function UpdateContact(Request $request, $id){

        $data = Contact::find($id);

        $validateData = $request->validate([
            'name'   => 'required|max:255',
            'mobile' => 'required|unique:contacts,mobile,'.$data->id,
            'email'  => 'required|unique:contacts,email,'.$data->id
        ]);

        $data->name       = $request->name;
        $data->job_title  = $request->job_title;
        $data->company    = $request->company;
        $data->email      = $request->email;
        $data->mobile     = $request->mobile;
        $data->dob        = empty($request->dob)? null : date('Y-m-d',strtotime($request->dob));
        $data->address    = $request->address;
        $data->note       = $request->note;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/contact_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/contact_images'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Contact updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('view.contact')->with($notification);
    }

    public function DeleteContact(Request $request){

        $mobile_with_contact = Contact::select('mobile')->first();
        $mobile_with_user_info = UserInfo::select('mobile')->first();



        if ($mobile_with_contact != $mobile_with_user_info){
            $notification = array(
                'message' => 'error, This Contact is not deleted!',
                'alert-type' => 'error'

            );

            return redirect()->back()->with($notification);

        }

        //dd($mobile_with_contact->toArray());

        $data = Contact::where('id',$request->id)->first();

        if ($data->image != null){
            @unlink(public_path('upload/contact_images/'.$data->image));
        }
        $data->delete();

        $notification = array(
            'message' => 'Contact Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('view.contact')->with($notification);

    }


    public function getContact(){
        $query = Contact::all();
        return Response::json(['contacts' => $query]);
    }


}
