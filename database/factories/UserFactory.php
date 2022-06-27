<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'role' => 'user',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Состояние для учетной записи администратора
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'name' => 'admin',
                    'email' => 'admin@test.ru',
                    'role' => 'admin',
                    // 'password' => bcrypt('oiSD$83s4Fda23d_S23'),

                ];
            }
        );
    }

    /**
     * Состояние для учетной записи пользователя
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function user()
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'name' => 'user',
                    'email' => 'user@test.ru',
                    'role' => 'user',
                ];
            }
        );
    }
}
