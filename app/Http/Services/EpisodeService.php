<?php

namespace App\Http\Services;

use App\Models\Episode;
use Illuminate\Support\Facades\Cache;

class EpisodeService
{

	public function index(int $page)
	{
		$episodes = Cache::rememberForever('episodes-page-' . request('page', 1), function ()
		{
			return Episode::query()->with('characters')->paginate(10);
		});
		return $episodes;
	}
}