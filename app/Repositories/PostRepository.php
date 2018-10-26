<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;

use App\Traits\CrudMethods;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostRepository extends BaseRepository implements PostRepositoryInterface
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
    protected $modelClass = 'App\Post';

    /**
     * Setting $this->query with a instance of EloquentQueryBuilder|QueryBuilder.
     */
    public function __construct()
    {
        $this->query = $this->newQuery();
        $this->category = new CategoryRepository();
    }
    
    public function getPosts()
    {
        return $this->getAll();
    }

    public function createPost(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

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

    public function getCategoriesFromPost($idPost)
    {
        $post = $this->getPostByID($idPost);
        return $post->categories;
    }

    public function addCategoryToPost($idCategories, $idPost)
    {
        $post = $this->getPostByID($idPost);
        return $post->categories()->attach($idCategories);
    }

    public function removeCategoryToPost($idCategories, $idPost)
    {
        $post = $this->getPostByID($idPost);
        return $post->categories()->detach($idCategories);
    }

    public function getArchiveFromPost($idPost)
    {
        $post = $this->getPostByID($idPost);
        return $post->archives;
    }

    public function addArchiveToPost($idArchives, $idPost)
    {
        $post = $this->getPostByID($idPost);
        return $post->archives()->attach($idArchives);
    }

    public function removeArchiveToPost($idArchives, $idPost)
    {
        $post = $this->getPostByID($idPost);
        return $post->archives()->detach($idArchives);
    }
}