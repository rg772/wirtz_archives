<?php

namespace Database\Factories;

use App\Models\Association;
use App\Models\People;
use App\Models\Production;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssociationFactory extends Factory
{
    protected $model = Association::class;

    public function definition()
    {
        return [
            'people_id' => People::factory(),
            'production_id' => Production::factory(),
            'role_id' => Role::factory(),
            'status' => $this->faker->randomElement(\App\Helpers\CommonValues::getStatuses()),
        ];
    }
}
