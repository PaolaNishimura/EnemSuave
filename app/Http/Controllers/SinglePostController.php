<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Repositories\PostRepository;

class SinglePostController extends Controller
{
    //
    public function index($id)
    {
        Carbon::setLocale('pt-br');
        $postRepository = new PostRepository();
        $post = $postRepository->getPostByIDWithRelationship($id);

        return view('single-post', compact('post'));
    }
}
