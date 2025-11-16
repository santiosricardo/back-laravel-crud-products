<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word();
        return [
            'name'         => $name,
            'slog'         => Str::slug($name),
            'cover'        => fake()->imageUrl(),
            'price'        => fake()->randomFloat(1, 20, 50),
            'description'  => fake()->sentence(),
            'stock'        => fake()->randomDigit(),
            
        ];
    }
}
