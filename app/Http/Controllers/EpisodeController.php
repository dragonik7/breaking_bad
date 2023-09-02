<?php

namespace App\Http\Controllers;

use App\Http\Resources\Episodes\EpisodeIndexResource;
use App\Http\Resources\Episodes\EpisodeShowResource;
use App\Http\Services\EpisodeService;

class EpisodeController extends Controller
{

	public function __construct(protected EpisodeService $service) {}

	public function index() {
		$page = request('page', 1);
		$episodes = $this->service->index($page);
		return EpisodeIndexResource::collection($episodes);
	}

	public function show($episode_id) {
		$episode = $this->service->get_episode($episode_id);
		return new EpisodeShowResource($episode);
	}

}
