<?php

namespace App\Reports\DataSets;

use Illuminate\Http\Client\Request;
use Reporting\DataSets\Schema;

class ExampleSchema implements Schema
{
    public function metrics(): array
    {
        return [
            "records_count"
        ];
    }

    public function dimensions(): array
    {
        return [
            "dimension_1",
            "dimension_2",
            "dimension_3"
        ];
    }
}
