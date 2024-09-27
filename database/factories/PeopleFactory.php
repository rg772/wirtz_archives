<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Helpers\StatusHelper;
use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\People>
 */
final class PeopleFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = People::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'netid' => fake()->word,
            'grad' => fake()->year,
            'status' => fake()->randomElement(StatusHelper::getStatuses()),
        ];
    }
}
