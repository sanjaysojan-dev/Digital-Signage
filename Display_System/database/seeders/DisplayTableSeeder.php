<?php

namespace Database\Seeders;

use App\Models\Display;
use App\Models\DisplayContent;
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
        $display = new DisplayContent;
        $display->id = 1;
        $display->description = "display description";
        $display->location = "Swansea";
        $display->display_resolution = "1920 x 1080";
        $display->user_id = 1;

        Display::factory()
            ->times(5)
            ->create();
    }
}
