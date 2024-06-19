<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Branch;
use App\Models\BranchPhone;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Пользователи но в целом не особо нужно
        // \App\Models\User::factory(10)->create();

        // Создание администратора
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
        
        // Создание тестовых услуг
        Service::factory(30)->create();

        // Создание тестовых отделений с номерами телефонов
        Branch::factory(12)->has(BranchPhone::factory()->count(2))->create();
    }
}
