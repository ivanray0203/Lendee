<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repository as RepositoryInterface;


/**
 * Class Repository.
 */
class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function index($data)
    {
        try {
            return $this->model->all();
        } catch (\Exception $e) {
            throw $e;
        }   
    }

    public function all()
    {

    }

    public function show($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (\Exception $exception) {
            throw $exception;
        } 
    }
    
    public function store(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function update(array $data, $id)
    {
        try {
            $lendee = $this->model->findOrFail($id);
            $lendee->update($data);
            return $lendee;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function destroy($id)
    {
        try {
            $lendee = $this->model->findOrFail($id);
            $lendee->delete();
            return $lendee;
        } catch (\Exception $exception) {
            throw $exception;
        }  

    }
    public function getModel()
    {
        return $this->model;
    }
}
