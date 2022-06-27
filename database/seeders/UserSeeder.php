<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // создаем администратора
        User::factory()
            ->count(1)
            ->admin()
            ->create();

        // создаем пользователя
        User::factory()
            ->count(1)
            ->user()
            ->hasVideos(15)
            ->hasComments(10)
            ->create();
    }
}
