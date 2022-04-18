<?php

namespace DataStudio;

use Exception;
use Illuminate\Database\Query\Builder;
use Reporting\DataSets\BaseSchema;
use Reporting\DataSets\DataSet;
use Reporting\DataSets\Schema;

abstract class GdsDataSet implements DataSet
{
    private Builder $builder;
    private Schema  $schema;

    //@todo Заменить на Query
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->schema  = new BaseSchema(
            array_keys($this->metrics()),
            array_keys($this->dimensions())
        );
    }

    public function schema(): Schema
    {
        return $this->schema;
    }

    public function data(Schema $schema): array
    {
        if (array_diff($schema->metrics(), $this->schema->metrics()) ||
            array_diff($schema->dimensions(), $this->schema->dimensions())
        ) {
            throw new Exception("Invalid schema passed to dataset");
        }

        $query   = clone $this->builder;
        $filters = $this->resolvedMetrics($schema->metrics()) + $this->resolvedDimensions($schema->dimensions());

        foreach ($filters as $field => $callback) {
            $callback($query, $field);
        }

        return $query->get()->toArray();
    }

    protected function resolvedMetrics(array $metrics): array
    {
        return array_intersect_key($this->metrics(), array_flip($metrics));
    }

    protected function resolvedDimensions(array $dimensions): array
    {
        return array_intersect_key($this->dimensions(), array_flip($dimensions));
    }

    /**
     * @return array<string,Callable>
     */
    protected abstract function metrics(): array;

    /**
     * @return array<string,Callable>
     */
    protected abstract function dimensions(): array;
}
