<?php

namespace Reporting\DataSets;

class BaseSchema implements Schema
{
    private array $metrics;
    private array $dimensions;

    public function __construct(array $metrics, array $dimensions)
    {
        $this->metrics    = $metrics;
        $this->dimensions = $dimensions;
    }

    public function metrics(): array
    {
        return $this->metrics;
    }

    public function dimensions(): array
    {
        return $this->dimensions;
    }
}
