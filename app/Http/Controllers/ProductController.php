<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    public function products() 
    {

        $products = Product::general();
        $users  = User::partner();
        
        return view('front.products',compact('products','users'));
        
    }
    public function addProduct(Request $request) 
    {
        $product = new Product;
        $product->name = $request->name;
        $product->user_id = auth()->user()->id ?  auth()->user()->id:0;
        $product->subject = $request->subject;
        $product->details = $request->details;
        $product->save();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Product added successfully!');
        
    }
    public function deleteProduct($id) 
    {

        try {
            //code...
            $project = Product::find($id);
            DB::transaction(function () use ($project) {
                $project->delete();
            });
            $res = [
                "success"=>true,
                "message"=>"Idea removed,Think better",
            ];
            return response()->json($res);
        } catch (\Throwable $th) {
            dd($th);
        }
        
        
    }
    public function product($id) 
    {

        $product = Product::find($id);
        return view('front.product-details',compact('product'));
        
    }
}
/* tasks
    add href to products 
    how user_id will be stored and what will it be used 

*/