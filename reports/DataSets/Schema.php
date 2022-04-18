<?php

namespace Reporting\DataSets;

interface Schema
{
    public function metrics(): array;
    public function dimensions(): array;
}
