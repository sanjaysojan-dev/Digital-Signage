<?php

namespace Database\Factories;

use App\Models\Display;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisplayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Display::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_of_display' => $this->faker->unique()->catchPhrase,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->citySuffix,
            'display_resolution'=> $this->faker->uuid,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
