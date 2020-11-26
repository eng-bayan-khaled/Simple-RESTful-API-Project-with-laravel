<?php

namespace Database\Factories;

use App\Models\Keywords;
use Illuminate\Database\Eloquent\Factories\Factory;

class KeywordsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Keywords::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
