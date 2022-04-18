<?php

namespace Reporting\Csv;

trait Csvable
{
    public function csv(): string
    {
        $csv     = "";;
        $items   = $this->data();
        $headers = array_keys(get_object_vars($items[0]));

        $csv .= implode(",", $headers);

        foreach ($items as $item) {
            $csv .= PHP_EOL . implode(",", array_values(get_object_vars($item)));
        }

        return $csv;
    }
}
