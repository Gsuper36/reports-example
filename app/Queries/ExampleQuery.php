<?php

namespace App\Queries;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ExampleQuery
{
    private Builder $builder;

    public function __construct()
    {
        $builder = DB::table("report_data");
    }

    public function results(): Collection
    {
        return $this->builder->all();
    }
}
