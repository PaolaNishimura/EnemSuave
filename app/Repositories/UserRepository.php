<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
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
    protected $modelClass = 'App\User';

    /**
     * Setting $this->query with a instance of EloquentQueryBuilder|QueryBuilder.
     */
    public function __construct()
    {
        $this->query = $this->newQuery();
    }
    
    public function getUsers()
    {
        return $this->getAll();
    }

    public function getUserByID($id)
    {
        return $this->findByID($id);
    }

    public function getUserPosts()
    {
        $this->query->with('posts');

        return $this->doQuery($this->query);
    }

    public function getUserVideos()
    {
        $this->query->with('videos');

        return $this->doQuery($this->query);
    }
}