<?php

namespace Reporting;

interface HtmlableReport
{
    /**
     * @return string
     */
    public function html(): string;
}
