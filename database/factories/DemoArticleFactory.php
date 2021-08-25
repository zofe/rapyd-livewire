<?php

namespace Zofe\Rapyd\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Zofe\Rapyd\Models\DemoArticle;


class DemoArticleFactory extends Factory
{
    protected $model = DemoArticle::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'body' => $this->faker->text,
            'public'=> 1,
            'publication_date' => $this->faker->dateTime
        ];
        
    }
}

