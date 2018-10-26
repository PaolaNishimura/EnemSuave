<?php

namespace App\Http\Controllers;

use App\Repositories\VideoRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class VideoCategoryController extends Controller
{
    private $video;
    private $category;

    public function __construct(VideoRepository $video)
    {
        $this->video = $video;
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
        $video = $this->video->getVideoByID($id);
        $categories = $this->category->getCategories(false, false);
        $categoriesAttachedToVideo = $this->video->getCategoriesFromVideo($id);

        return view('videos.categories.index', compact('video', 'categories', 'categoriesAttachedToVideo'));
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
        $video = $this->video->addCategoryToVideo($request->categories_id, $id);

        return redirect()->route('videos.categories.index', $id);
    }

    public function destroy($idVideo, $idCategory)
    {
        $video = $this->video->removeCategoryFromVideo($idCategory, $idVideo);

        return redirect()->route('videos.categories.index', $idVideo);
    }
}
