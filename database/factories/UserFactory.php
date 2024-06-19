<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Генерация случайного имени пользователя
            'name' => fake()->name(),
            // Генерация уникального и безопасного email-адреса
            'email' => fake()->unique()->safeEmail(),
            // Установка текущего времени для атрибута 'email_verified_at'
            'email_verified_at' => now(),
            // Установка захешированного пароля
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // Генерация случайного токена для авторизации
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        // Определение состояния, когда адрес электронной почты пользователя не подтвержден
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
