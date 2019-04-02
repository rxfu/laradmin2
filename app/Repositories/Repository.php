<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Repository
{
    protected $object;

    public function __construct($object = null)
    {
        $this->object = $object;
    }

    public function getTable()
    {
        return $this->object->getTable();
    }

    public function getAttributes()
    {
        return $this->object->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getModel()
    {
        return get_class($this->object);
    }

    public function get($id, $trashed = false)
    {
        try {
            if ($trashed) {
                return $this->object->withTrashed()->findOrFail($id);
            }
        
            return $this->object->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new GeneralException('{' . $this->getModel() . ': ' . $id . '} 对象不存在');
        }
    }

    public function getAll()
    {
        return $this->object->all();
    }

    public function store($attributes)
    {
        $attributes = is_array($attributes) ? $attributes : [$attributes];
        $object = $this->object->create($attributes);

        if (!$object) {
            throw new GeneralException('{' . $this->getModel() . '} 对象创建失败');
        } else {
            return $object;
        }
    }

    public function update($id, $attributes)
    {
        $object = $this->get($id);
        $attributes = is_array($attributes) ? $attributes : [$attributes];

        if (false === $object->update($attributes)) {
            throw new GeneralException('{' . $this->getModel() . ': ' . $id . '} 对象更新失败');
        }
    }

    public function delete($id, $force = false)
    {
        $object = $this->get($id);
        $success =  $force ? $object->forceDelete() : $object->delete();

        if (is_null($success) || (false === $success)) {
            throw new GeneralException('{' . $this->getModel() . ': ' . $id . '} 对象删除失败');
        }
    }

    public function deleteAll($ids, $force = false)
    {
        $ids = is_array($ids) ? $ids : [$ids];

        foreach ($ids as $id) {
            $this->delete($id, $force);
        }
    }
}
