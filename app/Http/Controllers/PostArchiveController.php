<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\ArchiveRepository;
use Illuminate\Http\Request;

class PostArchiveController extends Controller
{
    private $post;
    private $archives;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
        $this->archives = new ArchiveRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $post = $this->post->getPostByID($id);
        $archives = $this->archives->getArchives(false, false);
        $archivesAttachedToPost = $this->post->getArchiveFromPost($id);

        return view('posts.archives.index', compact('post', 'archives', 'archivesAttachedToPost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        //
        $post = $this->post->addArchiveToPost($request->archives_id, $id);

        return redirect()->route('posts.archives.index', $id);
    }
}
