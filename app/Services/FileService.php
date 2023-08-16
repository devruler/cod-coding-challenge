<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function uploadFile($file){
        if (!$file) return null;
        $name = $file->hashName();
        $path = $file->storeAs('products', $name, 'public');
        return $path;
    }
}
