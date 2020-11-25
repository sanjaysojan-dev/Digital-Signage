<?php

namespace Database\Seeders;

use App\Models\Display;
use Illuminate\Database\Seeder;

class DisplayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Display::factory()
            ->times(5)
            ->create();
    }
}
