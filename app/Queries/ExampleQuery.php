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
        $this->builder = DB::table("report_data");
    }

    public function results(array $params): Collection
    {
        $query   = clone $this->builder;
        $filters = $this->filters(
            explode(",", $params["metrics"]) + explode(",", $params["dimensions"])
        );

        $this->applyFilters($query, $filters);

        return $query->get();
    }

    private function filters(array $params): array
    {
        return array_intersect_key(
            $this->dimensions() + $this->metrics(),
            array_flip($params)
        );
    }

    private function applyFilters($sql, array $filters): void
    {
        foreach ($filters as $key => $callback) {
            $callback($sql, $key);
        }
    }

    private function metrics(): array
    {
        return [
            "records_count" => function ($sql, $metric) {
                $sql->addSelect(DB::raw("count(*) as {$metric}"));
            }
        ];
    }

    private function dimensions(): array
    {
        return [
            "dimension_1" => function ($sql) {
                $sql->addSelect("dimension_1");
                $sql->groupBy("dimension_1");
            },
            "dimension_2" => function ($sql) {
                $sql->addSelect("dimension_2");
                $sql->groupBy("dimension_2");
            },
            "dimension_3" => function ($sql) {
                $sql->addSelect("dimension_3");
                $sql->groupBy("dimension_3");
            }
        ];
    }

    // private function rules(): array
    // {
        // return [
            // "metrics" => [
                // "required",
                // "string"
            // ],
            // "dimensions" => [
                // "sometimes",
                // "string"
            // ],
            // "dateTo"   => "sometimes|required|date",
            // "dateFrom" => "sometimes|required|date",
        // ];
    // }
}
