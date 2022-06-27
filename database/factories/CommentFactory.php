<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'video_id' =>  $this->faker->numberBetween(1, 3),
            'text' =>  $this->faker->text(mt_rand(50, 300)),
        ];
    }
}
