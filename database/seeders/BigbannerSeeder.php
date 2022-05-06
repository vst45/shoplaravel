<?php

namespace Database\Seeders;

use App\Models\Bigbanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BigbannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bigbanner::factory(10)->create();
    }
}
