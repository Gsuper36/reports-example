<?php

namespace DataStudio;

use Exception;
use Reporting\Csv\Csvable;
use Reporting\Csv\CsvableReport;
use Reporting\DataSets\BaseSchema;
use Reporting\DataSets\Schema;
use Reporting\Json\Jsonable;
use Reporting\Json\JsonableReport;

class GdsReport implements CsvableReport, JsonableReport
{
    use Jsonable;
    use Csvable;

    private GdsDataSet $dataSet;
    private string     $title;
    private Schema     $schema;

    public function __construct(
        array $params,
        GdsDataSet $ds,
        string $title = "Gds report"
    ) {
        $this->dataSet = $ds;
        $this->title   = $title;
        $this->schema  = $this->resolvedSchema($params);
    }

    public function title(): string
    {
        return $this->title;
    }

    public function data(): array
    {
        return $this->dataSet->data(
            $this->schema
        );
    }

    private function resolvedSchema(array $params): Schema
    {
        if (! isset($params["metrics"]) &&
            ! isset($params["dimensions"])
        ) {
            throw new Exception("Metrics or dimensions aren't set");
        }

        //@todo Проверка значений на массив
        return new BaseSchema(
            $params["metrics"],
            $params["dimensions"]
        );
    }
}
