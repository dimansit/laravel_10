<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return User::query();
    }

    public function getActiveNews(): Collection
    {
        return $this->getModel()
            ->active()
            ->get();
    }

    public function getAll(): Collection|LengthAwarePaginator
    {
        return $this->getModel()
            ->get();
    }
}
