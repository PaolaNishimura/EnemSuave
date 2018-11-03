<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Repositories\CategoryRepository;

use App\Traits\Paginate;

class HomeCategoryController extends Controller
{
    use Paginate;
    //
    public function index($category = null)
    {
        Carbon::setLocale('pt-br');
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAllCategories();
        
        if($category !== null){
            $categoryRepository = new CategoryRepository();
            $posts = $categoryRepository->getPostsByCategoryID($category)->posts;
            $categoryRepository = new CategoryRepository();
            $videos = $categoryRepository->getVideosByCategoryID($category)->videos;
            $item = new Collection();

            $posts = $item->push($posts)->push($videos);
            $posts = $this->paginate($posts->flatten()->sortByDesc('created_at'));
            
            return view('categories', compact('categories', 'posts'));
        }

        return view('categories', compact('categories'));
    }
}
