<?php

namespace Database\Seeders;

use App\Models\DisplayContent;
use Illuminate\Database\Seeder;

class DisplayContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisplayContent::factory()
            ->times(5)
            ->create();
    }
}
