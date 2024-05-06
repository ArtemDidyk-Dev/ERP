<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Model $model
 */
abstract class BaseRepository
{
    protected array $with = [];

    /**
     * @var Model
     */
    protected mixed $model;

    public function __construct()
    {
        $this->model = resolve($this->getModelClassName());
    }

    abstract public function getModelClassName(): mixed;

    final public function all(): mixed
    {
        return $this->model::all();
    }

    final public function get()
    {
        return $this->model->with($this->with)
            ->get();
    }

    final public function findById($id): Model
    {
        return $this->model->with($this->with)
            ->findOrFail($id);
    }

    /**
     * @return mixed
     */
    final public function create($data): Model
    {
        return $this->model::create($data);
    }

    final public function update($id, $data): bool
    {
        return $this->findById($id)
            ->update($data);
    }

    final public function delete($id): int
    {
        return $this->model->destroy($id);
    }

    public function where($key, $value, $operator = '='): mixed
    {
        return $this->model->where($key, $operator, $value);
    }

    public function whereLike($key, $value, $pattern = '\%%s\%'): mixed
    {
        return $this->model->where($key, 'like', sprintf($pattern, $value));
    }

    public function whereGet($key, $value, $operator = '='): mixed
    {
        return $this->where($key, $value, $operator)
            ->get();
    }

    /**
     * @param string $operator
     */
    public function whereFirst($key, $value, $operator = '='): Model
    {
        return $this->where($key, $value, $operator)
            ->first();
    }

    final public function setRelations($relations): static
    {
        if (! is_array($relations)) {
            $this->with = [$relations];
        } else {
            $this->with = $relations;
        }
        return $this;
    }

    public function whereIn($ids): mixed
    {
        return $this->model::with($this->with)->whereIn('id', $ids)->get();
    }

    public function whereHas($relation, $callbacks = null)
    {
        return $this->model->with($this->with)
            ->whereHas($relation, $callbacks)
            ->get();
    }
}
