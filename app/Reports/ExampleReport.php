<?php

namespace App\Reports;

use App\Queries\ExampleQuery;
use Reporting\CsvableReport;
use Reporting\HtmlableReport;
use Reporting\JsonableReport;
use Reporting\Report;

class ExampleReport implements Report, JsonableReport, HtmlableReport, CsvableReport
{
    private string $title = "Example report";
    private ExampleQuery $query;

    public function __construct()
    {
        $this->query = new ExampleQuery();
    }

    public function title(): string
    {
        return $this->title;
    }

    public function data(): array
    {
        return $this->query->results()
            ->toArray();
    }

    public function json(): string
    {
        return json_encode($this->data());
    }

    public function html(): string
    {
        return "";
    }

    public function csv(): string
    {
        return "";
    }
}
