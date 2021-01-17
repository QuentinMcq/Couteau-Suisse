<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'user' => User::all()->random()->name,
            'department' => $this->faker->randomElement(['Informatique', 'MMI', 'GEA', 'TC']),
            'informations' => $this->faker->text($maxNbChars = 200)
        ];
    }
}
