<?php

namespace App\Console\Commands;

use App\Models\Character;
use App\Models\Episode;
use App\Models\Quote;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RedisUpdateCommand extends Command {

	protected $signature = 'redis:update';

	protected $description = 'Command description';

	public function handle(): void {
		Character::query()->with('episodes', 'quotes')->each(function ($character) {
			Cache::put('character:' . $character->id, $character);
		});
		Cache::rememberForever('character:max', function () {
			return Character::max('id');
		});
		Episode::query()->with('quotes', 'characters')->each(function ($episode) {
			Cache::put('episode:' . $episode->id, $episode);
		});
		Cache::rememberForever('episode:max', function () {
			return Episode::max('id');
		});
		Quote::query()->with('episode', 'character')->each(function ($quote) {
			Cache::put('quote:' . $quote->id, $quote);
		});
		Cache::rememberForever('quote:max', function () {
			return Quote::max('id');
		});
	}
}
