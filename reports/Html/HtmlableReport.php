<?php

namespace Reporting\Html;

use Reporting\Report;

interface HtmlableReport extends Report
{
    /**
     * @return string
     */
    public function html(): string;
}
