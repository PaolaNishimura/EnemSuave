<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    private $post;
    private $category;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
        $this->category = new CategoryRepository();
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
        $categories = $this->category->getCategories(false, false);
        $categoriesAttachedToPost = $this->post->getCategoriesFromPost($id);

        return view('posts.categories.index', compact('post', 'categories', 'categoriesAttachedToPost'));
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
        if($request->categories_id == "N"){
            return redirect()->route('videos.categories.index', $id);
        }
        
        $post = $this->post->addCategoryToPost($request->categories_id, $id);

        return redirect()->route('posts.categories.index', $id);
    }

    public function destroy($idPost, $idCategory)
    {
        $post = $this->post->removeCategoryToPost($idCategory, $idPost);

        return redirect()->route('posts.categories.index', $idPost);
    }
}
