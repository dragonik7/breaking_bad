<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{

	public function run(): void
	{
		Quote::factory(500)->make()->each(function (Quote $quote)
		{
			$episode = Episode::query()->inRandomOrder()->firstOrFail();
			$quote->episode()->associate($episode);

			$character = $episode->characters()->inRandomOrder()->firstOrFail();
			$quote->character()->associate($character);

			$quote->save();
		});
	}
}
