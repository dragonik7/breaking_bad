<?php

namespace App\Http\Resources\Episodes;

use App\Http\Resources\Characters\CharacterEpisodeShowResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Episode */
class EpisodeShowResource extends JsonResource
{

	public function toArray(Request $request): array
	{
		return [
			'id'         => $this->id,
			'title'      => $this->title,
			'air_date'   => $this->air_date,
			'characters' => CharacterEpisodeShowResource::collection($this->characters),
		];
	}
}
