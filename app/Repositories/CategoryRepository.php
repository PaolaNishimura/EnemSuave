<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

use App\Traits\CrudMethods;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
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
    protected $modelClass = 'App\Category';

    /**
     * Setting $this->query with a instance of EloquentQueryBuilder|QueryBuilder.
     */
    public function __construct()
    {
        $this->query = $this->newQuery();
    }

    public function getAllCategories()
    {
        $this->query->withCount('posts', 'videos');

        return $this->doQuery($this->query, false, false);
    }

    public function getPostsByCategoryID($id)
    {
        $this->query->with('posts.categories')->where('id', $id);

        return $this->doQuery($this->query, null, false);
    }

    public function getVideosByCategoryID($id)
    {
        $this->query->with('videos.categories')->where('id', $id);

        return $this->doQuery($this->query, null, false);
    }

    public function getCategories($take = 15, $paginate = true)
    {
        return $this->getAll($take, $paginate);
    }

    public function createCategory(Request $request)
    {
        return $this->create($request->all());
    }

    public function getCategoryByID($id)
    {
        return $this->findByID($id);
    }

    public function updateCategory(Model $model, Request $request)
    {
        return $this->update($model, $request->all());
    }

    public function deleteCategory(Model $model)
    {
        return $this->delete($model);
    }
}