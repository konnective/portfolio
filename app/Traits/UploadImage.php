<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImage
{
    /**
     * Upload an image to a given directory and return its path.
     *
     * @param UploadedFile $image
     * @param string $folder
     * @param string|null $disk
     * @return string
     */
    public function uploadImage(UploadedFile $image, string $folder = 'uploads', string $disk = 'public'): string
    {
        // Generate a unique file name
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

        // Store the file
        $path = $image->storeAs($folder, $filename, $disk);

        return $path; // This will return something like "uploads/filename.jpg"
    }

        /**
     * Get the full URL of an uploaded image.
     *
     * @param string $path
     * @param string $disk
     * @return string
     */
    public function getImageUrl(string $path, string $disk = 'public'): string
    {
        // return Storage::disk($disk)->url($path);
        return asset('');
    }
}