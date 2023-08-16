<?php

namespace App\Services;

use Illuminate\Http\Request;

class FileService
{
    public function uploadFile($file){
        if (!$file) return null;
        $imagePath = $file->store('products', 'public');
        return $imagePath;
    }
}
