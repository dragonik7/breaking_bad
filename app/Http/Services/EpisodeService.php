<?php

namespace App\Http\Services;

use App\Models\Episode;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EpisodeService {

	public function index(int $page) {
		$episodes = Cache::rememberForever('episodes-page-' . request('page', 1), function () {
			return Episode::query()->with('characters')->paginate(10);
		});
		return $episodes;
	}

	public function get_episode(int $episode_id) {
		$episode = Cache::get('episode:' . $episode_id);
		if (is_null($episode)) {
			throw new NotFoundHttpException;
		}
		return $episode;
	}
}
