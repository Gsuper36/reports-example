<?php

namespace App\Reports;

use Reporting\Html\Chart;
use Reporting\Html\HtmlableReport;

class ExampleChartReport implements HtmlableReport
{
    private array $charts;

    /**
     * @todo Как пример
     * private Layout $layout - Объект компоновки отчета
     */

    /**
     * @param array[Chart] $charts
     */
    public function __construct(array $charts)
    {
        $this->charts = $charts;
    }

    public function title(): string
    {
        return "Example report with charts";
    }

    public function data(): array
    {
        return array_map(function (Chart $chart) {
            return $chart->html();
        }, $this->charts);
    }

    public function html(): string
    {
        return view(
            "example_chart_report",
            [
                "charts" => $this->charts,
                "title"   => $this->title()
            ]
        )->render();
    }
}
