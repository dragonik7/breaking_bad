<?php

namespace App\Http\Resources\Characters;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\Episodes\EpisodeShowResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Character */
class CharacterIndexResource extends JsonResource
{

	public function toArray(Request $request): array
	{
		return [
			'id'               => $this->id,
			'name'             => $this->name,
			'birthday'         => $this->birthday,
			'occupations_json' => $this->occupations_json,
			'img'              => $this->img,
			'nickname'         => $this->nickname,
			'portrayed'        => $this->portrayed,
			'created_at'       => $this->created_at,
			'updated_at'       => $this->updated_at,

			'episodes' => CategoryResource::collection($this->whenLoaded('episodes')),
			'quotes' => CategoryResource::collection($this->whenLoaded('quotes')),
		];
	}
}
