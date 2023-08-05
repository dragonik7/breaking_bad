<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CharacterFactory extends Factory
{

	protected $model = Character::class;

	public function definition(): array
	{
		return [
			'name'             => $this->faker->name(),
			'birthday'         => Carbon::now(),
			'occupations_json' => $this->faker->words(),
			'img'              => $this->faker->word(),
			'nickname'         => $this->faker->word(),
			'portrayed'        => $this->faker->word(),
			'created_at'       => Carbon::now(),
			'updated_at'       => Carbon::now(),
		];
	}
}
