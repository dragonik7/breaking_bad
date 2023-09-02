<?php

namespace App\Http\Resources\Characters;

use App\Http\Resources\Episodes\EpisodeShowResource;
use App\Http\Resources\Quotes\QuoteShowResource;
use App\Http\Resources\ResponseCollection;
use Illuminate\Http\Request;

/** @mixin \App\Models\Character */
class CharacterShowResource extends ResponseCollection {

	public function toArray(Request $request): array {
		return [
			'id'               => $this->id,
			'name'             => $this->name,
			'birthday'         => $this->birthday,
			'occupations_json' => $this->occupations_json,
			'img'              => $this->img,
			'nickname'         => $this->nickname,
			'portrayed'        => $this->portrayed,

			'episodes' => EpisodeShowResource::collection($this->whenLoaded('episodes')),
			'quotes'   => QuoteShowResource::collection($this->whenLoaded('quotes')),
		];
	}
}
