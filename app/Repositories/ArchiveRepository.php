<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\ArchiveRepositoryInterface;

use App\Services\FileService;

use App\Traits\CrudMethods;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class ArchiveRepository extends BaseRepository implements ArchiveRepositoryInterface
{
    use CrudMethods;
    /**
     * EloquentQueryBuilder|QueryBuilder query from base repository
     * FileService object from App\Service\FileService.
     * 
     * @var string $query
     * @var string $filename
     */
    private $query;
    private $fileService;

    /**
     * Model class for repositories.
     * Apartment Model
     * 
     * @var string  $modelClass
     */
    protected $modelClass = 'App\Archive';

    /**
     * Setting $this->query with a instance of EloquentQueryBuilder|QueryBuilder.
     */
    public function __construct()
    {
        $this->query = $this->newQuery();
        $this->fileService = new FileService();
    }

    public function getArchives($take = 15, $paginate = false)
    {
        return $this->getAll($take, $paginate);
    }

    public function getArchiveByUrl($url)
    {
        return $this->findByColumn('url', $url);
    }

    public function downloadFileByUrl($url)
    {
        $model = $this->getArchiveByUrl($url);
        $title = $model->title;
        $filename = $model->url;

        return $this->fileService->donwloadFile($filename, $filename);
    }

    public function uploadArchive(UploadedFile $file, $title)
    {
        $data = [];
        $filename = $this->fileService->uploadFile($file);

        $data['title'] = $title;
        $data['url'] = $filename;

        return $this->create($data);
    }

    public function deleteArchive(Model $model)
    {
        $this->fileService->deleteFile($model->url);
        
        return $this->delete($model);
    }

    public function updateArchive(UploadedFile $file, Model $model, $title)
    {
        $data = [];
        $filename = $this->fileService->updateFile($file, $model->url);

        $data['title'] = $title;
        $data['url'] = $filename;

        return $this->update($model, $data);
    }
}