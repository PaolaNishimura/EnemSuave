<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;

use App\Traits\CrudMethods;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends BaseRepository implements PostRepositoryInterface
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
    protected $modelClass = 'App\Post';

    /**
     * Setting $this->query with a instance of EloquentQueryBuilder|QueryBuilder.
     */
    public function __construct()
    {
        $this->query = $this->newQuery();
    }
    
    public function getPosts()
    {
        return $this->getAll();
    }

    public function createPost(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = 1;

        return $this->create($data);
    }

    public function getPostByID($id)
    {
        return $this->findByID($id);
    }

    public function updatePost(Model $model, Request $request)
    {
        return $this->update($model, $request->all());
    }

    public function deletePost(Model $model)
    {
        return $this->delete($model);
    }
}