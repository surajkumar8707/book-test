<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Text>
 */
class TextFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();

        return [
            'code' => Str::random(3),
            'name' => $faker->title . ' ' . $faker->name,
            'location' => $faker->address,
            'category' => $faker->word,
            'schedule' => $faker->sentence,
            'price' => Str::random(3),
            'reportedon' => Str::random(10),
            'simple_guideline' => $faker->paragraph
        ];
    }
}
