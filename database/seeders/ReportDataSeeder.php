<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("report_data")->insert([
            "dimension_1" => Str::random(7),
            "dimension_2" => Str::random(14),
            "dimension_3" => random_int(0, 10)
        ]);
    }
}
