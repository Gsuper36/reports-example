<?php

namespace App\Http\Controllers;

use App\Reports\ExampleReport;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function jsonReport(Request $request)
    {
        $report = new ExampleReport($request->toArray());

        return response($report->json(), 200, ["Content-Type" => "application/json"]);
    }

    public function htmlReport(Request $request)
    {
        $report = new ExampleReport($request->toArray());

        return response($report->html());
    }

    public function csvReport(Request $request)
    {
        $report = new ExampleReport($request->toArray());

        return response($report->csv(), 200, ["Content-Type" => "text/csv"]);
    }
}
