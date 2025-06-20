<?php

namespace App\Http\Controllers\admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Pcategory;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    use UploadImage;


    public function index()
    {
        $posts = Product::with('category')->orderBy('created_at', 'desc')
            ->paginate(10); 
        $categories = Pcategory::all();
        $pageHeading = 'Products';

        return view('admin.products.index', compact('posts','categories','pageHeading'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        $categories = Pcategory::all();
        $brands = Brand::all();
        $pageTitle = 'Create a Product';
        $pageHeading = 'Products';
        
        return view('admin.products.create', compact('categories','brands','pageTitle','pageHeading'))
            ->with('success', 'Your message here');

        // return view('admin.products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        try {
            // Begin transaction
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $path = $this->uploadImage($request->file('image'), 'products');
            }
            // Create post
            $post = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id ? $request->category_id:0,
                'brand_id' => $request->brand_id ? $request->brand_id:0,
                'price' => $request->price,
                'sku' => $request->sku,
                'discount_price' => $request->discount_price,
                'stock_quantity' => $request->stock_quantity,
                'image_url' => isset($path) ? $path : '',
                'status' => $request->status,
                'user_id' => $request->user_id,
            ]);

            // Handle tags
            DB::commit();

            return redirect()
                ->route('admin.products')
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
     * Display the specified blog post.
     */
    public function show(Post $post)
    {
        $post->load(['tags', 'category', 'user']);
        return view('admin.products.show', compact('post'));
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit($id)
    {
        $record = Product::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $brands = Brand::all();
        $pageTitle = 'Update a Product';
        $pageHeading = 'Products';
        
        return view('admin.products.edit',
        compact(
             'brands',
             'categories',
             'tags',
             'pageTitle',
             'pageHeading',
             'record'
        ));
    }

    /**
     * Update the specified blog post.
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $post = Product::find($request->product_id);
            if ($post->image_url) {
                Storage::disk('public')->delete($post->image_url);
            }
            $post->update([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id ? $request->category_id:0,
                'brand_id' => $request->brand_id ? $request->brand_id:0,
                'price' => $request->price,
                'sku' => $request->sku,
                'image_url' => $path ? $path : '',
                'discount_price' => $request->discount_price,
                'stock_quantity' => $request->stock_quantity,
                'status' => $request->status,
                'user_id' => $request->user_id,
            ]);
            foreach($request->file('image') as $item){
                $path = $this->uploadImage($item, 'products');
                $imageCreate = ProductImage::create([
                    'product_id'=>$post->id,
                    'image_url'=>$path,
                ]);
                
            }

            DB::commit();

            return redirect()
                ->route('admin.products')
                ->with('success', 'Product updated successfully!');

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
    public function destroy(Request $request)
    {

        $post = Product::findOrFail($request->product_id);
        try {
            DB::beginTransaction();
            // Delete post (tags will be automatically detached due to database relationship)
            $post->delete();

            DB::commit();

            $res = [
                "success"=>true,
                "type"=>'success',
                "message"=>"Product deleted successfully",
            ];
            return response()->json($res);

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

        return view('admin.products.index', compact('posts'));
    }
}
