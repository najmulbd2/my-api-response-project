<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;

class FoodController extends Controller
{
    //
    public function ViewFood(){

        $data['allData'] = Food::all();

//        dd($data['allData']->toArray());

        return view('backend.food.view_food',$data);
    }

    public function AddFood(){
        return view('backend.food.add_food');
    }

    public function StoreFood(Request $request){

        //Laravel Validation
        $dataValidate = $request->validate([
            'name'        => 'required|max:255|unique:food',
            'price'       => 'required',
            'description' => 'required'
        ]);

        //dd($request->month);

        //Data insert
        $data = new Food();
        $data->name        = $request->name;
        $data->price       = $request->price;
        $data->month   = $request->month;
        $data->description = $request->description;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/food_images'),$filename);
            $data['image'] = $filename;
        }
        $data->added_by = Auth::user()->id;

        $data->save();

        $notification = array(
            'message' => 'Food Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditFood($id){
        $data['editData'] = Food::find($id);
        return view('backend.food.edit_food',$data);

    }

    public function UpdateFood(Request $request, $id){


        $data = Food::find($id);
        $dataValidate = $request->validate([
            'name'        => 'required|max:255|unique:food,name,'.$data->id,
            'price'       => 'required',
            'description' => 'required'
        ]);

//        dd($request->name);

        //Data Update
        $data->name        = $request->name;
        $data->price       = $request->price;
        $data->description = $request->description;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/food_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/food_images'),$filename);
            $data['image'] = $filename;
        }
        $data->updated_by = Auth::user()->id;
        $data->save();

        $notification = array(
            'message' => 'Food Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


}
