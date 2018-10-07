<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\VideoRepositoryInterface;

use App\Traits\CrudMethods;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class VideoRepository extends BaseRepository implements VideoRepositoryInterface
{
    use CrudMethods;

    /**
     * EloquentQueryBuilder|QueryBuilder query from base repository.
     * 
     * @var string $query
     */
    private $query;

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
    }
    
    public function getVideos()
    {
        return $this->getAll();
    }

    public function createVideo(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = 1;

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
}