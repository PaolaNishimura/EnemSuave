<?php
namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
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
    public function getAll($take = 15, $paginate = true);
    /**
     * @param string        $column
     * @param string|null   $key
     * 
     * @return \Illuminate\Support\Collection
     */
    
    public function lists($column, $key = null);
    /**
     * Returns a record by id.
     * If fail is true & there is not a record $ fires ModelNotFoundException.
     * 
     * @param int   $id
     * @param bool  $fail
     * 
     * @return Model
     */
    public function findByID($id, $fail = true);
}