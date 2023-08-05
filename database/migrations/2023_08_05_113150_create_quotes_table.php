<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up(): void
	{
		Schema::create('quotes', function (Blueprint $table)
		{
			$table->id();
			$table->mediumText('title');
			$table->foreignId('episode_id')->constrained('episodes');
			$table->foreignId('character_id')->constrained('characters');

			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('quotes');
	}
};
