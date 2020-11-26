<?php

namespace Database\Factories;

use App\Models\Comments;
use App\Models\User;
use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

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
            'status' => $this->faker->numberBetween($min = 0, $max = 1),
            'user_id' => User::factory()->create()->id,
            'article_id' => Articles::factory()->create()->id,
        ];
    }
}
