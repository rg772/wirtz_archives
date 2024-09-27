<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Helpers\CommonValues;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Venue>
 */
final class VenueFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Venue::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'status' => fake()->randomElement(CommonValues::getStatuses()),
        ];
    }
}
