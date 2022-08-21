<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lifeStoryBoard>
 */
class lifeStoryBoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'title' => $this->faker->unique()->sentence(4),
            'u_id' => $this->faker->numberBetween(1,1),
            'content' => $this->faker->unique()->realText(20),
            'source' => $this->faker->unique()->sentence(4),
            'like' => $this->faker->numberBetween(0,30),
            'dislike' => $this->faker->numberBetween(0,20),
            'is_published' => $this->faker->boolean(true),
            'is_deleted' => $this->faker->boolean(false),
            'created_at' => $this->faker->dateTimeBetween('-1 year','-1 month'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year','now'),
            'gubun' => $this->faker->numberBetween(1,1),
            'views' => $this->faker->numberBetween(0,3456),
            'nickname' => $this->faker->word(),
        ];
    }
}
