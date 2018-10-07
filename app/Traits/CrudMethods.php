<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait CrudMethods
{
    /**
     * Creates a new record by filling all
     * 
     * @param array $data
     * 
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create(array $data = [])
    {
        $model = $this->factory($data);

        $this->save($model);

        return $model;
    }

    /**
     * Updates the record by filling all
     * 
     * @param Illuminate\Database\Eloquent\Model    $model
     * @param array                                 $data
     * 
     * @return Illuminate\Database\Eloquent\Model
     */
    public function update(Model $model, array $data = [])
    {
        $this->setModelData($model, $data);

        $this->save($model);

        return $model;
    }

    /**
     * Deletes the record by model
     * Can be used to implement business logic before this command.
     * 
     * @param Illuminate\Database\Eloquent\Model    $model
     * 
     * @return bool
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * Saves the record by model.
     * Can be used to implement business logic before this command.
     * 
     * @param Illuminate\Database\Eloquent\Model    $model
     * 
     * @return Illuminate\Database\Eloquent\Model
     */
    public function save(Model $model)
    {
        $model->save();

        return $model;
    }

    /**
     * Instantiate a new model object.
     * Sets $data information to the new instantiated model object.
     * 
     * @param array $data
     * 
     * @return Illuminate\Database\Eloquent\Model
     */
    public function factory(array $data = [])
    {
        $model = $this->newQuery()->getModel()->newInstance();
        $this->setModelData($model, $data);

        return $model;
    }

    /**
     * @param Illuminate\Database\Eloquent\Model    $model
     * @param array                                 $data
     */
    protected function setModelData(Model $model, array $data)
    {
        $model->fill($data);
    }
}