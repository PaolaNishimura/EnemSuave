<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

interface CategoryRepositoryInterface
{
    public function getCategories();
    
    public function createCategory(Request $request);

    public function getCategoryByID($id);

    public function updateCategory(Model $model, Request $request);

    public function deleteCategory(Model $model);
}