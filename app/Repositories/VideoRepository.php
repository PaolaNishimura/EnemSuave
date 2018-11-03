<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\VideoRepositoryInterface;

use App\Traits\CrudMethods;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VideoRepository extends BaseRepository implements VideoRepositoryInterface
{
    use CrudMethods;

    /**
     * EloquentQueryBuilder|QueryBuilder query from base repository.
     * 
     * @var string $query
     */
    private $query;
    private $category;

    /**
     * Model class for repositories.
     * Apartment Model
     * 
     * @var string  $modelClass
     */
    protected $modelClass = 'App\Video';

    /**
     * Setting $this->query with a instance of EloquentQueryBuilder|QueryBuilder.
     */
    public function __construct()
    {
        $this->query = $this->newQuery();
        $this->category = new CategoryRepository();
    }
    
    public function getVideos()
    {
        return $this->getAll();
    }

    public function getAllVideos()
    {
        $this->query->with('categories')->orderBy('created_at', 'desc');
        
        return $this->doQuery($this->query, false, false);
    }

    public function getVideoByIDWithRelationship($id)
    {
        $this->query->with('categories')->where('id', $id);

        return $this->doQuery($this->query, null, false);
    }

    public function createVideo(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        return $this->create($data);
    }

    public function getVideoByID($id)
    {
        return $this->findByID($id);
    }

    public function updateVideo(Model $model, Request $request)
    {
        return $this->update($model, $request->all());
    }

    public function deleteVideo(Model $model)
    {
        return $this->delete($model);
    }

    public function getCategoriesFromVideo($idVideo)
    {
        $video = $this->getVideoByID($idVideo);
        return $video->categories;
    }

    public function addCategoryToVideo($idCategories, $idVideo)
    {
        $video = $this->getVideoByID($idVideo);
        return $video->categories()->attach($idCategories);
    }

    public function removeCategoryFromVideo($idCategories, $idVideo)
    {
        $video = $this->getVideoByID($idVideo);
        return $video->categories()->detach($idCategories);
    }
}