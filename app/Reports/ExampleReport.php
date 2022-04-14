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
    private array $params;

    public function __construct(array $params)
    {
        $this->query  = new ExampleQuery();
        $this->params = $params;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function data(): array
    {
        return $this->query
            ->results($this->params)
            ->toArray();
    }

    public function json(): string
    {
        return json_encode($this->data());
    }

    public function html(): string
    {
        return view(
            "example_report",
            [
                "title" => $this->title(),
                "items" => $this->data()
            ]
        )->render();
    }

    public function csv(): string
    {
        return "";
    }
}
