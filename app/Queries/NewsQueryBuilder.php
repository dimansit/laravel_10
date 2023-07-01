<?php

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return News::query();
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
            ->with('categories')
            ->get();
    }
}
