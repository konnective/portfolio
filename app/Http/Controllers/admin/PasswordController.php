<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

class PasswordController extends Controller
{
    //

    public function index()
    {
        $posts = Password::orderBy('created_at', 'desc')
            ->paginate(10);
        $pageHeading = 'Passwords';

        return view('admin.passwords.index', compact('pageHeading'));
    }

    public function create()
    {
        $pageTitle = 'Create a Product';
        $pageHeading = 'Passwords';
        
        return view('admin.passwords.create', compact('pageTitle','pageHeading'))
            ->with('success', 'Password Saved here');

    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        try {
            // Begin transaction
            DB::beginTransaction();


            // Create post
            $post = Password::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id ? $request->category_id:0,
                'brand_id' => $request->brand_id ? $request->brand_id:0,
                'price' => $request->price,
                'sku' => $request->sku,
                'discount_price' => $request->discount_price,
                'stock_quantity' => $request->stock_quantity,
                'status' => $request->status,
                'user_id' => $request->user_id,
            ]);

            // Handle tags
            DB::commit();

            return redirect()
                ->route('admin.Passwords')
                ->with('success', 'Product created successfully!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit($id)
    {
        $pageTitle = 'Update a Passwords';
        $pageHeading = 'Passwords';
        
        return view('admin.passwords.edit',
        compact(
             'pageTitle',
             'pageHeading'
        ));
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $post = Password::find($request->pass_id);

            // Update post
            
            $post->update([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id ? $request->category_id:0,
                'brand_id' => $request->brand_id ? $request->brand_id:0,
                'price' => $request->price,
                'sku' => $request->sku,
                'discount_price' => $request->discount_price,
                'stock_quantity' => $request->stock_quantity,
                'status' => $request->status,
                'user_id' => $request->user_id,
            ]);

            DB::commit();

            return redirect()
                ->route('admin.Passwords')
                ->with('success', 'Password updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating Password: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {

        $post = Password::findOrFail($request->pass_id);
        try {
            DB::beginTransaction();

            $post->delete();

            DB::commit();

            $res = [
                "success"=>true,
                "type"=>'success',
                "message"=>"Password deleted successfully",
            ];
            return response()->json($res);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->with('error', 'Error deleting Password: ' . $e->getMessage());
        }
    }

    /**
     * Bulk operations on posts
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,publish,draft',
            'posts' => 'required|array',
            'posts.*' => 'exists:posts,id'
        ]);

        try {
            DB::beginTransaction();

            switch ($request->action) {
                case 'delete':
                    $posts = Password::whereIn('id', $request->posts)->get();
                    foreach ($posts as $post) {
                        if ($post->featured_image) {
                            Storage::disk('public')->delete($post->featured_image);
                        }
                        $post->delete();
                    }
                    $message = 'Posts deleted successfully!';
                    break;

                case 'publish':
                    Password::whereIn('id', $request->posts)->update(['status' => 'published']);
                    $message = 'Posts published successfully!';
                    break;

                case 'draft':
                    Password::whereIn('id', $request->posts)->update(['status' => 'draft']);
                    $message = 'Posts moved to draft successfully!';
                    break;
            }

            DB::commit();

            return redirect()
                ->route('admin.blogs')
                ->with('success', $message);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->with('error', 'Error performing bulk action: ' . $e->getMessage());
        }
    }
}
