<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\UploadImage;


class FrontendController extends Controller
{
    //
    use UploadImage;


    public  function index()
    {
        $products = Product::all()->map(function($item){
            $item->image = $item->image_url ? $this->getImageUrl($item->image_url) : '';
            return $item;
        });
        $hero = Banner::first();
        return view('frontend.new-store.home',compact('products','hero'));
    }
    public  function test(Request $request)
    {
        if (!$request->hasFile('image')) {
            return 'No file uploaded';
        }

        $path = $this->uploadImage($request->file('image'), 'products');

        return $path;
    }
    public  function productDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.new-store.pro-details',compact('product'));
    }
    public  function cart()
    {
        return view('frontend.new-store.cart');
    }
  

}
