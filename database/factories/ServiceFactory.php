<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Генерация случайного имени продукта
            'name'=>fake()->realText(fake()->numberBetween(10, 20)),
            // Генерация случайного описания продукта
            'description'=>fake()->realText(fake()->numberBetween(1500, 2000)),
            // Генерация случайной цены продукта в диапазоне от 500 до 2100 с двумя знаками после запятой
            'price'=>fake()->randomFloat(2, 500, 2100),
        ];
    }
}
