<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    //

    public function index()
    {
        $posts = Content::with(['topic'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.content.index', compact('posts'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        $subjects = Subject::all();
        $topics = Topic::all();
        
        return view('admin.content.create', compact('topics', 'subjects'))
            ->with('success', 'Your message here');

        // return view('admin.content.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        try {
            // Begin transaction
            DB::beginTransaction();

            // Handle featured image upload
            $imagePath = null;
            if ($request->hasFile('featured_image')) {
                $imagePath = $request->file('featured_image')->store('posts/images', 'public');
            }
            // Create post
            $post = Content::create([
                'title' => $request->title,
                'details' => $request->details,
                // 'subject_id' => $request->subject_id ? $request->subject_id:0,
                'topic_id' => $request->topic_id ? $request->topic_id:0,
                // 'featured_image' => $imagePath,
                'user_id' => $request->user_id,
            ]);

            // Handle tags
            DB::commit();

            return redirect()
                ->route('admin.content')
                ->with('success', 'Post created successfully!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Delete uploaded image if exists
            if (isset($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // dd($e);
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating post: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified blog post.
     */
    public function show(Post $post)
    {
        $post->load(['tags', 'category', 'user']);
        return view('admin.content.show', compact('post'));
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit($id)
    {
        $record = Content::find($id);
        $subjects = Subject::all();
        $topics = Topic::all();
        
        return view('admin.content.edit', compact('record','topics', 'subjects'));
    }

    /**
     * Update the specified blog post.
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $post = Content::find($request->post_id);
            $post->update([
                'title' => $request->title,
                'details' => $request->details,
                // 'subject_id' => $request->subject_id ? $request->subject_id:0,
                'topic_id' => $request->topic_id ? $request->topic_id:0,
                // 'featured_image' => $imagePath,
                'user_id' => $request->user_id,
            ]);


            DB::commit();

            return redirect()
                ->route('admin.content')
                ->with('success', 'Post updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating post: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified blog post.
     */
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();

            // Delete featured image if exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            // Delete post (tags will be automatically detached due to database relationship)
            $post->delete();

            DB::commit();

            return redirect()
                ->route('admin.content')
                ->with('success', 'Post deleted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->with('error', 'Error deleting post: ' . $e->getMessage());
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
                    $posts = Content::whereIn('id', $request->posts)->get();
                    foreach ($posts as $post) {
                        if ($post->featured_image) {
                            Storage::disk('public')->delete($post->featured_image);
                        }
                        $post->delete();
                    }
                    $message = 'Posts deleted successfully!';
                    break;

                case 'publish':
                    Content::whereIn('id', $request->posts)->update(['status' => 'published']);
                    $message = 'Posts published successfully!';
                    break;

                case 'draft':
                    Content::whereIn('id', $request->posts)->update(['status' => 'draft']);
                    $message = 'Posts moved to draft successfully!';
                    break;
            }

            DB::commit();

            return redirect()
                ->route('admin.content')
                ->with('success', $message);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->with('error', 'Error performing bulk action: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $query = Content::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('content', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('meta_description', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        $posts = $query->with(['tags', 'category'])
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.content.index', compact('posts'));
    }
}
