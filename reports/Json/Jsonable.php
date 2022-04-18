<?php

namespace Reporting\Json;

trait Jsonable
{
    public function json(): string
    {
        return json_encode($this->data());
    }
}
