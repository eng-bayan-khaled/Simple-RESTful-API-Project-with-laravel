<?php

namespace Database\Factories;

use App\Models\Articles;
use App\Models\Authers;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'content' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'auther_id' => Authers::factory()->create()->id,
        ];
    }
}
