<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function ViewProduct(){
        $data['allData'] = Product::all();
        return view('backend.product.view_product',$data);
    }

    public function AddProduct(){
        return view('backend.product.add_product');
    }

    public function StoreProduct(Request $request){

        $validateData = $request->validate([
            'name'        => 'required|max:255|unique:products,name',
            'price'       => 'required',
            'description' => 'required|max:500'
        ]);

        $data = new Product();
        $data->name        = $request->name;
        $data->price       = $request->price;
        $data->description = $request->description;
        $data->added_by    = Auth::user()->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product_images'),$filename);
            $data['image'] = $filename;
        }
        //dd($data->toArray());
        $data->save();

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function EditProduct($id){
        $data['editData'] = Product::find($id);
        return view('backend.product.edit_product',$data);
    }

    public function UpdateProduct(Request $request, $id){

        $data              = Product::find($id);

        $validateData = $request->validate([
            'name'        => 'required|max:255|unique:products,name,'.$data->id,
            'price'       => 'required',
            'description' => 'required|max:500'
        ]);

        $data->name        = $request->name;
        $data->price       = $request->price;
        $data->description = $request->description;
        $data->updated_by  = Auth::user()->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/product_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/product_images'),$filename);
            $data['image'] = $filename;
        }
        //dd($data->toArray());
        $data->save();

        $notification = array(
            'message' => 'Product Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function DeleteProduct($id){

        $data = Product::find($id);
        if ($data->image != null){
            @unlink(public_path('upload/product_images/'.$data->image));
        }
        $data->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.product')->with($notification);
    }




}
