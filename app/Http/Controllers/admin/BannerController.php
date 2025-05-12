<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    use UploadImage;
    //

    public function index()
    {
        $pageHeading = 'Banner';
        $pageTitle = 'Create Banner';
        $hero = Banner::first();
        return view('admin.banner.banner', compact('pageHeading','pageTitle','hero'));
    }
    public function createOrUpdate(Request $request)
    {
        try {
            // Begin transaction
            DB::beginTransaction();

            $banner = Banner::first(); 
            if ($banner && $banner->img && $request->hasFile('image')) {
                Storage::disk('public')->delete($banner->img);
            }
            if ($request->hasFile('image')) {
                $path = $this->uploadImage($request->file('image'), 'banner');
            }
            
            if ($banner) {
                $banner->title = $request->title ? $request->title : $banner->title;
                $banner->subtitle = $request->subtitle ? $request->subtitle : $banner->subtitle;
                $banner->description = $request->description ? $request->description : $banner->description;
                $banner->img = isset($path) ? $path : $banner->img;
                $banner->save();
            } else {
                $banner = Banner::create([
                    'title' => $request->title,
                    'subtitle' => $request->subtitle,
                    'description' => $request->description,
                    'img' => isset($path) ? $path : ' ',
                ]);
            }

        
            DB::commit();

            return redirect()
                ->route('admin.products')
                ->with('success', 'Banner added successfully!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error creating Banner: ' . $e->getMessage());
        }
    }
}
