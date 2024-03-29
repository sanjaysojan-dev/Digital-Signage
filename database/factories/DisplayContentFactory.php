<?php

namespace Database\Factories;

use App\Models\DisplayContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisplayContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DisplayContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content_title' => $this->faker->unique()->name,
            'content_description' => $this->faker->paragraph,
            'user_id' => 1
        ];
    }
}
