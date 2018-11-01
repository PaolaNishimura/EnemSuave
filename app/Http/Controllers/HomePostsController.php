<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Repositories\PostRepository;

use Illuminate\Http\Request;

class HomePostsController extends Controller
{
    private $posts;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = new PostRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts->getPosts();
        Carbon::setLocale('pt-br');
        return view('welcome', compact('posts'));
    }
}
