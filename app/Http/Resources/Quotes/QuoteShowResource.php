<?php

namespace App\Http\Resources\Quotes;

use App\Http\Resources\Characters\CharacterEpisodeShowResource;
use App\Http\Resources\Episodes\EpisodeShowResource;
use App\Http\Resources\ResponseCollection;
use Illuminate\Http\Request;

/** @mixin \App\Models\Quote */
class QuoteShowResource extends ResponseCollection {

	public function toArray(Request $request): array {
		return [
			'id'        => $this->id,
			'title'     => $this->title,
			'character' => new CharacterEpisodeShowResource($this->whenLoaded('character')),
			'episode'   => new EpisodeShowResource($this->whenLoaded('episode')),
		];
	}
}
