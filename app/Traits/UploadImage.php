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


    public function uploadImages(array $images, string $path): array
    {
        $uploadedImagePaths = [];

        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                // Validate the image (optional)
                $this->validateImage($image);

                // Store the image and get the path
                $imagePath = $image->store($path, 'public');
                $uploadedImagePaths[] = $imagePath;
            }
        }

        return $uploadedImagePaths;
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
        return asset('storage/app/public/'.$path);
    }

    public function deleteImage(string $folder, string $filename): bool
    {
        $path = $folder . '/' . $filename;

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false; // File doesn't exist
    }
}