<?php

namespace App\Http\Services;

use App\Models\Character;
use Illuminate\Support\Facades\Cache;

class CharactersService {

	public function index(int $page, string|null $name) {
		if ($name) {
			return Character::query()
				->with('episodes', 'quotes')
				->where('name', 'ilike', "%$name%")
				->paginate(10);

		} else {
			$characters = Cache::rememberForever('character-page-' . $page, function () {
				return Character::query()
					->with('episodes', 'quotes')
					->paginate(10);
			});
		}
		return $characters;
	}

	public function get_random_character() {
		return
			Cache::get('character:' . rand(0, Cache::get('character:max')));
	}
}
