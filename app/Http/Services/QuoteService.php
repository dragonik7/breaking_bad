<?php

namespace App\Http\Services;

use App\Models\Quote;
use Illuminate\Support\Facades\Cache;

class QuoteService {

	public function index(int $page) {
		$quotes = Cache::rememberForever('quote-page-' . $page, function () {
			return Quote::query()
				->paginate(10);
		});
		return $quotes;
	}

	public function get_random_character() {
		return Cache::get('quote:' . rand(0, Cache::get('quote:max')));
	}
}
