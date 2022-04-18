<?php

namespace Reporting\Csv;

use Reporting\Report;

interface CsvableReport extends Report
{
    /**
     * @return string
     */
    public function csv(): string;
}
