<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function getUsers();

    public function getUserByID($id);

    public function getUserPosts();

    public function getUserVideos();
}