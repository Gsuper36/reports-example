<?php

namespace App\Queries;

use App\Reports\DataSets\ExampleSchema;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Reporting\DataSets\DataSet;
use Reporting\DataSets\Schema;

class ExampleQuery implements DataSet
{
    private Builder $builder;
    private ExampleSchema $schema;

    public function __construct()
    {
        $this->builder = DB::table("report_data");
        $this->schema  = new ExampleSchema();
    }

    public function schema(): Schema
    {
        return $this->schema;
    }

    public function data(Schema $schema): array
    {
        //@todo Костыль, переделать бы!

        return $this->results([
            "metrics"    => implode(",", $schema->metrics()),
            "dimensions" => implode(",", $schema->dimensions())
        ])
        ->toArray();
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
        //@todo Создать класс QuerySchema, который будет использовать объекты
        //__toString, __invoke для таких случаев, подумать как это получше имплементировать
        $metrics = $this->schema->metrics();

        $metric["records_count"] = function ($sql, $metric) {
            $sql->addSelect(DB::raw("count(*) as {$metric}"));
        };

        return $metrics;
    }

    private function dimensions(): array
    {
        $dimensions = $this->schema->dimensions();

        $dimensions["dimension_1"] = function ($sql) {
            $sql->addSelect("dimension_1");
            $sql->groupBy("dimension_1");
        };

        $dimensions["dimension_2"] = function ($sql) {
            $sql->addSelect("dimension_2");
            $sql->groupBy("dimension_2");
        };

        $dimensions["dimension_3"] = function ($sql) {
            $sql->addSelect("dimension_3");
            $sql->groupBy("dimension_3");
        };

        return $dimensions;
    }
}
