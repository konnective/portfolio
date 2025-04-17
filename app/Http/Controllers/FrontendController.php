<?php

namespace App\Http\Controllers;

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
            $item->image = $this->getImageUrl($item->image_url);
            return $item;
        });
        return view('frontend.home',compact('products'));
    }
    public  function test(Request $request)
    {
        if (!$request->hasFile('image')) {
            return 'No file uploaded';
        }

        $path = $this->uploadImage($request->file('image'), 'products');

        return $path;
    }
    public  function productDetail()
    {
        return view('frontend.pro-details');
    }
    public  function cart()
    {
        return view('frontend.cart');
    }
  

}
