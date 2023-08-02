<?php

namespace App\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SourcesQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Source::query();
    }


    public function getAll(): Collection|LengthAwarePaginator
    {
        return $this->getModel()->get();
    }
}
