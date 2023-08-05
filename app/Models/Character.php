<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Character extends Model
{

	use HasFactory;

	protected $casts = [
		'birthday'         => 'date',
		'occupations_json' => 'array',
	];

	public function episodes(): BelongsToMany
	{
		return $this->belongsToMany(Episode::class, 'episode_characters', 'character_id', 'episode_id');
	}

	public function quotes(): HasMany
	{
		return $this->hasMany(Quote::class, 'character_id');
	}
}