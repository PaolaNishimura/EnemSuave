<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Repositories\VideoRepository;

use Illuminate\Http\Request;

class SingleVideoController extends Controller
{
    //
    public function index($id)
    {
        Carbon::setLocale('pt-br');
        $videoRepository = new VideoRepository();
        $post = $videoRepository->getVideoByIDWithRelationship($id);

        return view('single-video', compact('post'));
    }
}
