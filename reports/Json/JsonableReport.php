<?php

namespace Reporting\Json;

use Reporting\Report;

interface JsonableReport extends Report
{
    /**
     * @return string
     */
    public function json(): string;
}

