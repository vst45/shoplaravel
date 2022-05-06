<?php

namespace Database\Seeders;

use App\Models\Middlebanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiddlebannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Middlebanner::factory(25)->create();
    }
}
