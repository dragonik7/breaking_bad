<?php

namespace App\Http\Resources\Episodes;

use App\Http\Resources\ResponseCollection;
use Illuminate\Http\Request;

/** @mixin \App\Models\Episode */
class EpisodeIndexResource extends ResponseCollection {

	public function toArray(Request $request): array {
		return [
			'id'       => $this->id,
			'title'    => $this->title,
			'air_date' => $this->air_date,
		];
	}
}
