<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Episode;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{

	public function run(): void
	{
		Episode::factory(30)->create()->each(function (Episode $episode)
		{
			$this->syncCharacters($episode);
		});

	}

	protected function syncCharacters(Episode $episode): void
	{
		$characters = Character::query()->limit(rand(5, 15))->inRandomOrder()->get()->pluck('id')->toArray();
		$episode->characters()->sync($characters);
	}
}
