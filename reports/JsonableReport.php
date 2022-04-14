<?php

namespace Reporting;

interface JsonableReport extends Report
{
    /**
     * @return string
     */
    public function json(): string;
}

