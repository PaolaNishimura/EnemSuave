<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Model class for repositories
     * 
     * @var string
     */
    protected $modelClass;

    /**
     * @return EloquentQueryBuilder|QueryBuilder
     */

    protected function newQuery()
    {
        return app($this->modelClass)->newQuery();
    }

    /**
     * @param EloquentQueryBuilder|QueryBuilder $query
     * @param int                               $take
     * @param bool                              $paginate
     * 
     * @return EloquentCollection|Paginator
     */

    protected function doQuery($query = null, $take = 15, $paginate = true)
    {
        if(is_null($query)){
            $query = $this->newQuery();
        }

        if($paginate == true){
            return $query->paginate($take);
        }

        if ($take == null && $take !== false) {
            return $query->firstOrFail(); 
        }

        if($take > 0 || $take !== false){
            $query->take($take);
        }

        return $query->get();
    }

    /**
     * Returns all records of a model.
     * If $take is false then get all records.
     * If $paginate is true returns an instance of Paginator.
     * 
     * @param int   $take
     * @param bool  $paginate
     * 
     * @return EloquentCollection|Paginator
     */

    public function getAll($take = 15, $paginate = true)
    {
        return $this->doQuery(null, $take, $paginate);
    }

    /**
     * @param string        $column
     * @param string|null   $key
     * 
     * @return \Illuminate\Support\Collection
     */
    
    public function lists($column, $key = null)
    {
        return $this->newQuery()->pluck($column, $key);
    }

    /**
     * Returns a record by id.
     * If fail is true & there is not a record $ fires ModelNotFoundException.
     * 
     * @param int   $id
     * @param bool  $fail
     * 
     * @return Illuminate\Database\Eloquent\Model
     */

    public function findByID($id, $fail = true)
    {
        if($fail){
            return $this->newQuery()->findOrFail($id);
        }

        return $this->newQuery()->find($id);
    }

    public function findByColumn($column, $value, $fail = true)
    {
        if($fail){
            return $this->newQuery()->where($column, $value)->firstOrFail();
        }

        return $this->newQuery()->where($column, $value)->first();
    }
}