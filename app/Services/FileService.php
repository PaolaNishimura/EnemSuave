<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function uploadFile(UploadedFile $file)
    {
        return $file->store('');
    }
    
    public function deleteFile($filename)
    {
        Storage::delete($filename);
    }

    public function updateFile(UploadedFile $file, $filename)
    {
        $this->deleteFile($filename);
        return $this->uploadFile($file);
    }
    
    public function donwloadFile($filename, $title)
    {
        return Storage::download($filename, $title);
    }
}