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

    public function getCategories()
    {
        return $this->getAll();
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