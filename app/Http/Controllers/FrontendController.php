<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public  function index()
    {
        return view('frontend.home');
    }
    public  function test(Request $request)
    {
        if (!$request->hasFile('image')) {
            return 'No file uploaded';
        }
    
        $imagePath = $request->file('image')->store('uploads', 'public');
        return 'true';
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
