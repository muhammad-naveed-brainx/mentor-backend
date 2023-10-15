<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function store($file): array
    {
        $fileName = time().'.'.$file->extension();
        $filePath = env('IMAGE_DIRECTORY', 'uploads/') . $fileName;
        $filePath = Storage::disk('s3')->put($filePath, $file);
        $url = Storage::disk('s3')->url($filePath);
        return [$filePath, $url];
    }

}
