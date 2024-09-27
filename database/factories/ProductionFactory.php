<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Helpers\CommonValues;
use App\Models\Production;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Production>
 */
final class ProductionFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Production::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'season' => fake()->word,
            'status' => fake()->randomElement(CommonValues::getStatuses()),
        ];
    }
}
