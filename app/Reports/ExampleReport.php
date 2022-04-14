<?php

namespace App\Reports;

use Reporting\CsvableReport;
use Reporting\HtmlableReport;
use Reporting\JsonableReport;
use Reporting\Report;

class ExampleReport implements Report, JsonableReport, HtmlableReport, CsvableReport
{
    private string $title = "Example report";
    private $query;

    public function title(): string
    {
        return $this->title;
    }

    public function data(): array
    {
        return [];
    }

    public function json(): string
    {
        return json_encode($this->data);
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
