<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

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
        return Str::ucfirst(Str::singular($this->getTable()));
    }

    public function get($id, $trashed = false)
    {
        try {
            if ($trashed) {
                return $this->object->withTrashed()->findOrFail($id);
            }
        
            return $this->object->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new GeneralException('[' . $this->getModel() . ': ' . $id . '] 对象未找到');
        }
    }

    public function getAll()
    {
        return $this->object->all();
    }

    public function store($attributes)
    {
        $attributes = is_array($attributes) ? $attributes : [$attributes];

        return $this->object->create($attributes);
    }

    public function update($id, $attributes)
    {
        $object = $this->get($id);
        $attributes = is_array($attributes) ? $attributes : [$attributes];

        $object->update($attributes);
    }

    public function delete($id, $force = false)
    {
        $object = $this->get($id);

        return $force ? $object->forceDelete() : $object->delete();
    }

    public function deleteAll($ids, $force = false)
    {
        $ids = is_array($ids) ? $ids : [$ids];

        foreach ($ids as $id) {
            $this->delete($id, $force);
        }
    }

    public function destroy($ids)
    {
        $ids = is_array($ids) ? $ids : [$ids];

        return $this->object->destroy($ids);
    }
}
