<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Episode extends Model
{

	use HasFactory;

	protected $casts = [
		'air_date' => 'datetime',
	];

	public function characters(): BelongsToMany
	{
		return $this->belongsToMany(Character::class, 'episode_characters', 'episode_id', 'character_id');
	}

	public function quotes(): HasMany
	{
		return $this->hasMany(Quote::class, 'episode_id');
	}
}
