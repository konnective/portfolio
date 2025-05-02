<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Password;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class PasswordController extends Controller
{
    //

    public function index()
    {
        $posts = Password::orderBy('created_at', 'desc')
            ->paginate(10);
        $posts->getCollection()->transform(function ($item) {
            $item->name = $item->title ? Crypt::decrypt($item->title): '';
            return $item;
        }); 
        $pageHeading = 'Passwords';

        return view('admin.passwords.index', compact('pageHeading','posts'));
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
            $encryptedText = Crypt::encrypt($request->title);

            // Create post
            $post = Password::create([
                'title' => $encryptedText,
                'password' => $request->password,
            ]);

            // Handle tags
            DB::commit();

            return redirect()
                ->route('admin.passwords')
                ->with('success', 'Password created successfully!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating Password: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function view($id)
    {
        $pageTitle = 'Update a Passwords';
        $pageHeading = 'Passwords';
        $item = Password::findOrFail($id);
        $item->name = $item->title ? Crypt::decrypt($item->title): '';
        
        return view('admin.passwords.view',
        compact(
             'pageTitle',
             'item',
             'pageHeading'
        ));
    }
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
                'title' => $request->title,
                'password' => $request->password,
            ]);

            DB::commit();

            return redirect()
                ->route('admin.passwords')
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
