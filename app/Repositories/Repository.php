<?php

namespace App\Repositories;

class Repository {

	protected $object;

	public function __construct($object = null) {
		$this->object = $object;
	}

	public function getTable() {
		return $this->object->getTable();
	}

	public function getAttributes() {
		return $this->object->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
	}

	public function getModel() {
		return Str::singular($this->getTable());
	}

	public function get($id, $trashed = false) {
		if ($trashed) {
			return $this->object->withTrashed()->findOrFail($id);
		}

		return $this->object->findOrFail($id);
	}

	public function getAll() {
		return $this->object->get();
	}

	public function store($attributes) {
		if (is_array($attributes)) {
			$this->object->Fill($attributes);

			$this->object->saveOrFail();

			return true;
		}

		return false;
	}

	public function update($id, $attributes) {
		$this->object = $this->get($id);

		if (is_array($attributes)) {
			$this->object->fill($attributes);

			$this->object->saveOrFail();

			return true;
		}

		return false;
	}

	public function delete($id, $force = false) {
		$this->object = $this->get($id);

		return $force ? $this->object->forceDelete() : $this->object->delete();
	}

	public function deleteAll($ids, $force = false) {
		if (is_array($ids)) {
			foreach ($ids as $id) {
				$this->delete($id, $force);
			}
		}
	}
}