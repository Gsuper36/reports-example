<?php

namespace App\Reports\Charts;

use Reporting\DataSets\DataSet;
use Reporting\DataSets\Schema;
use Reporting\Html\Chart;

class TableChart implements Chart
{
    private DataSet $set;
    private Schema  $requestSchema;

    public function __construct(DataSet $set, Schema $requestSchema = null)
    {
        $this->set           = $set;
        $this->requestSchema = $requestSchema ?? $set->schema();
    }

    public function withRequestSchema(Schema $requestSchema): self
    {
        return new self($this->set, $requestSchema);
    }

    public function html(): string
    {
        return view(
            "table_chart",
            [
                "items" => $this->set->data($this->requestSchema),
                "title" => "Table chart"
            ]
        );
    }
}
