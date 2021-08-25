<?php

namespace Zofe\Rapyd\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zofe\Rapyd\Demo\Models\DemoUser;


class DemoUserFactory extends Factory
{
    protected $model = DemoUser::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
        ];
    }
}

