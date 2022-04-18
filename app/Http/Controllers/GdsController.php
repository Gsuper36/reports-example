<?php

namespace App\Http\Controllers;

use App\Reports\DataSets\ExampleGdsDataset;
use DataStudio\GdsReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GdsController extends Controller
{
    public function csv(Request $request)
    {
        //@todo У Dataset не должен торчать наружу Builder, а то
        // получается что объект не гарантирует что схема = доступные поля таблицы
        $report = new GdsReport(
            [
                "metrics"    => explode(",", $request->metrics),
                "dimensions" => explode(",", $request->dimensions)
            ],
            new ExampleGdsDataset(DB::table("report_data")),
            "Csv report"
        );

        return response($report->csv(), 200, ["Content-Type" => "text/csv"]);
    }

    public function json(Request $request)
    {
        $report = new GdsReport(
            [
                "metrics"    => explode(",", $request->metrics),
                "dimensions" => explode(",", $request->dimensions)
            ],
            new ExampleGdsDataset(DB::table("report_data")),
            "Json report"
        );

        return response($report->json(), 200, ["Content-Type" => "application/json"]);
    }

    public function schema()
    {
        $dataset = new ExampleGdsDataset(DB::table("report_data"));

        return response()->json(
            [
                "metrics" => $dataset->schema()->metrics(),
                "dimensions" => $dataset->schema()->dimensions()
            ]
        );
    }
}
