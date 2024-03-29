<?php

namespace Database\Factories;

use App\Models\DisplayNode;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisplayNodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DisplayNode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'node_title' => $this->faker->unique()->name,
            'node_description' => $this->faker->paragraph,
            'node_location' => $this->faker->city,
            'node_mode' => 'Landscape',
            'user_id' => 1
        ];
    }
}
