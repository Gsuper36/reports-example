<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 1000; $i++) {
            $this->call("Database\\Seeders\\ReportDataSeeder");
        }
    }
}
