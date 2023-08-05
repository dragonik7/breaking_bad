<?php

namespace App\Http\Services;

use App\Models\Character;
use Illuminate\Support\Facades\Cache;

class CharactersService
{

	public function index(int $page, string $name)
	{

		$characters = Cache::rememberForever('character-page-' . $page, function ()
		{
			return Character::query()->with('episodes', 'quotes')->paginate(10);
		});

		return $characters;
	}
}