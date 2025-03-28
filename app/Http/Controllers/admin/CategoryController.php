<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    public function create()
    {
        // $categories = Category::all();
        // $tags = Tag::all();
        
        // return view('admin.products.create', compact('categories', 'tags'))
        //     ->with('success', 'Your message here');

        $pageHeading = 'Category';
        return view('admin.products.category', compact('pageHeading'));
    }
    public function store(Request $request)
    {
        dd($request);
        try {
            // Begin transaction
            DB::beginTransaction();


            // Create post
            $post = Pcategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->has('publish') ? 'published' : 'draft',
            ]);

        
            DB::commit();

            return redirect()
                ->route('admin.products')
                ->with('success', 'Category created successfully!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating post: ' . $e->getMessage());
        }
    }
}
