<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{

	public function run(): void
	{
		Character::factory(100)->create();
	}
}
