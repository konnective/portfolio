<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Traits\UploadImage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
   use UploadImage;

   public function index()
   {
      $posts = Post::with(['tags', 'category'])
				 ->orderBy('created_at', 'desc')
				 ->paginate(10);
      $posts->getCollection()->transform(function ($item) {
         $item->image = $item->featured_image ? $this->getImageUrl($item->featured_image) : '';
         return $item;
      });
      $pageTitle = 'Create a Blogs';
      $pageHeading = 'Blogs';

      return view('admin.blog.index', compact('posts', 'pageTitle', 'pageHeading'));
   }

   public function blogs()
   {
      $posts = Post::with(['tags', 'category'])
         ->orderBy('created_at', 'desc')
         ->get();
      $posts->getCollection()->transform(function ($item) {
         $item->image = $item->featured_image ? $this->getImageUrl($item->featured_image) : '';
         return $item;
      });
      $pageTitle = 'Create a Blogs';
      $pageHeading = 'Blogs';

      return view('admin.blog.index', compact('posts', 'pageTitle', 'pageHeading'));
   }

   /**
    * Show the form for creating a new blog post.
    */
   public function create()
   {
      $categories = Category::all();
      $tags = Tag::all();
      $pageTitle = 'Create a Blogs';
      $pageHeading = 'Blogs';

      return view('admin.blog.create', compact('categories', 'tags', 'pageTitle', 'pageHeading'))
         ->with('success', 'Your message here');

      // return view('admin.blog.create', compact('categories', 'tags'));
   }

   /**
    * Store a newly created blog post.
    */
   public function store(PostRequest $request)
   {
      try {
         // Begin transaction
         DB::beginTransaction();

         if (!$request->hasFile('image')) {
            return 'No file uploaded';
         }
         $path = $this->uploadImage($request->file('image'), 'blogs');

         // Create post
         $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id ? $request->category_id : 0,
            'featured_image' => $path,
            'meta_description' => $request->meta_description,
            'status' => $request->has('publish') ? 'published' : 'draft',
            'user_id' => $request->user_id,
         ]);

         // Handle tags
         if ($request->has('tags')) {
            $tags = collect($request->tags)->map(function ($tagName) {
               return Tag::firstOrCreate(['name' => $tagName])->id;
            });
            $post->tags()->sync($tags);
         }

         DB::commit();

         return redirect()
            ->route('admin.blogs')
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
      return view('admin.blog.show', compact('post'));
   }

   /**
    * Show the form for editing the specified blog post.
    */
   public function edit($id)
   {
      $pageTitle = 'Create a Blogs';
      $pageHeading = 'Blogs';
      $post = Post::find($id);
      // $post->load(['tags', 'category']);
      $categories = Category::all();
      $tags = Tag::all();

      return view('admin.blog.edit', compact('post', 'categories', 'tags', 'pageTitle', 'pageHeading'));
   }

   /**
    * Update the specified blog post.
    */
   public function update(PostRequest $request)
   {
      try {
         DB::beginTransaction();
         $post = Post::find($request->post_id);
         if ($post->featured_image && $request->hasFile('featured_image')) {
            Storage::disk('public')->delete($post->featured_image);
         }
         if ($request->hasFile('featured_image')) {
            $path = $this->uploadImage($request->file('featured_image'), 'blogs');
         }

         // Update post

         $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'featured_image' => $path ? $path : $post->featured_image,
            'meta_description' => $request->meta_description,
            'status' => $request->has('publish') ? 'published' : 'draft',
         ]);

         // Update tags
         if ($request->has('tags')) {
            $tags = collect($request->tags)->map(function ($tagName) {
               return Tag::firstOrCreate(['name' => $tagName])->id;
            });
            $post->tags()->sync($tags);
         }

         DB::commit();

         return redirect()
            ->route('admin.blogs')
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
            ->route('admin.blogs')
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
               $posts = Post::whereIn('id', $request->posts)->get();
               foreach ($posts as $post) {
                  if ($post->featured_image) {
                     Storage::disk('public')->delete($post->featured_image);
                  }
                  $post->delete();
               }
               $message = 'Posts deleted successfully!';
               break;

            case 'publish':
               Post::whereIn('id', $request->posts)->update(['status' => 'published']);
               $message = 'Posts published successfully!';
               break;

            case 'draft':
               Post::whereIn('id', $request->posts)->update(['status' => 'draft']);
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

   public function search(Request $request)
   {
      $query = Post::query();

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

      return view('admin.blog.index', compact('posts'));
   }
}
