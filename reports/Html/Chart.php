<?php

namespace Reporting\Html;

interface Chart
{
    // public function withDataSet(DataSet $set): self;

    /**
     * @return string
     */
    public function html(): string;
}
