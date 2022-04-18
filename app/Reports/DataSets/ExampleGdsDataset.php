<?php

namespace App\Reports\DataSets;

use DataStudio\GdsDataSet;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ExampleGdsDataset extends GdsDataSet
{
    protected function metrics(): array
    {
        //@todo Вынести Callable в __invoke класс
        return [
            "records" => function (Builder $query, string $metric) {
                $query->addSelect(DB::raw("count(*) as {$metric}"));
            },
            "money"  => function (Builder $query, string $metric) {
                $query->addSelect(DB::raw("sum(dimension_3) as {$metric}"));
            }
        ];
    }

    protected function dimensions(): array
    {
        return [
            "user_name" => function (Builder $query, string $dimension) {
                $query->addSelect(DB::raw("dimension_1 as {$dimension}"));
                $query->groupBy($dimension);
            }
        ];
    }
}
