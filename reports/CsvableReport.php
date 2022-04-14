<?php

namespace Reporting;

interface CsvableReport extends Report
{
    /**
     * @return string
     */
    public function csv(): string;
}
