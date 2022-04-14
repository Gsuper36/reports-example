<?php

namespace Reporting;

interface Report
{
    /**
     * @return string
     */
    public function title(): string;

    /**
     * @return array
     */
    public function data(): array;
}
