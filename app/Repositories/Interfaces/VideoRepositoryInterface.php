<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface VideoRepositoryInterface
{
    public function getVideos();

    public function createVideo(Request $request);

    public function getVideoByID($id);

    public function updateVideo(Model $model, Request $request);

    public function deleteVideo(Model $model);
}