<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->realText(),
            'status' => fake()->randomElement(['pending','in_progress','completed']),
            'image_path' => fake()->imageUrl(),
            'priority' => fake()->randomElement(['low','meduim','high']),
            'due_Date' => fake()->dateTime(),
            'user_id' =>1 ,
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
