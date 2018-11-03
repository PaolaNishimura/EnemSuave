<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Repositories\PostRepository;
use App\Repositories\VideoRepository;

use App\Traits\Paginate;

class HomePostsController extends Controller
{
    use Paginate;

    private $posts;
    private $videos;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->videos = new VideoRepository();
        $this->posts = new PostRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('pt-br');
        
        $posts = $this->posts->getPosts();
        $videos = $this->videos->getAllVideos();
        $item = new Collection();

        $posts = $item->push($posts)->push($videos);
        $posts = $this->paginate($posts->flatten());

        return view('welcome', compact('posts'));
    }
}
