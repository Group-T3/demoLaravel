<?php

namespace App\Repositories;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model_class;
    /** @var Model */
    protected mixed $model;

    /** @throws BindingResolutionException */
    public function __construct() {
        if ($this->model_class) {
            $this->model = app()->make($this->model_class);
        }
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getAllByStatus()
    {
        return $this->model->all()->where('status', '=', 'ACTIVE');
    }

    public function findById($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function findByIdAndStatus($id)
    {
        $result = $this->model->find($id);
        if ($result['status']=='ACTIVE'){
            return $result;
        }
    }

    public function hiden($id)
    {
        $record = $this->model->find($id);
        $record->status = 'DELETE';
        $record->save();
        $record->refresh();
        return $record;
    }

    public function create($data)
    {
        $result = $this->model->newQuery()->create($data);
        return $this->model->find($result->id);
    }

    public function update($id, $data)
    {
        $record = $this->model->find($id);
        $record->fill($data);
        $record->save();
        $record->refresh();
        return $record;
    }

    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

}
