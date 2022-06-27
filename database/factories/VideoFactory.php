<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'video_file' => 'test.mp4',
            'title' => $this->faker->text(mt_rand(10, 22)),
            'description' => $this->faker->paragraph(mt_rand(2, 3)),
            'likes' => $this->faker->numberBetween(0, 100),
            'dislikes' => $this->faker->numberBetween(0, 100),
            'category' => $this->faker->randomElement(
                [
                    'Новости',
                    'Обучение',
                    'Шоу',
                    'Музыка',
                ]
            ),
            'restrictions' => $this->faker->randomElement(
                [
                    'Без ограничений',
                    'Нарушение',
                    'Теневой бан',
                    'Бан',
                ]
            ),
        ];
    }
}
