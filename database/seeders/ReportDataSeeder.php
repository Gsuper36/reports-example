<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportDataSeeder extends Seeder
{
    private array $d1 = [
        "Value 1",
        "Value 2",
        "Value 3"
    ];

    private array $d2 = [
        "Green",
        "Blue",
        "Red"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10000; $i++) {
            DB::table("report_data")->insert([
                "dimension_1" => array_rand(array_flip($this->d1)),
                "dimension_2" => array_rand(array_flip($this->d2)),
                "dimension_3" => random_int(0, 10)
            ]);
        }
    }
}
