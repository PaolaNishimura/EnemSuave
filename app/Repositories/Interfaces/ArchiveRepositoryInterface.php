<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

interface ArchiveRepositoryInterface
{
    public function getArchives();

    public function getArchiveByUrl($url);

    public function downloadFileByUrl($url);

    public function uploadArchive(UploadedFile $file, $title);

    public function deleteArchive(Model $model);

    public function updateArchive(UploadedFile $file, Model $model, $title);
}