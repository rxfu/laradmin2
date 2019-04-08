<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->object = $user;
    }

    public function store($attributes)
    {
        try {
            $attributes = is_array($attributes) ? $attributes : [$attributes];
            $object = $this->object->create($attributes);
    
            if (!$object) {
                throw new InvalidRequestException($this->getModel() . ' 对象创建失败', $this->getObject(), 'store');
            } else {
            	$object->departments()->sync($attributes['department']);

                return $object;
            }
        } catch (QueryException $e) {
            throw new InternalException($this->getModel() . ' 对象创建错误', $this->getObject(), 'store', $e);
        }
    }

    public function update($id, $attributes)
    {
        $object = $this->get($id);
        $attributes = is_array($attributes) ? $attributes : [$attributes];

        if (false === $object->update($attributes)) {
            throw new InvalidRequestException($this->getModel() . ': ' . $id . ' 对象更新失败', $this->getObject(), 'update');
        }

        $object->departments()->sync($attributes['department']);
    }
}
