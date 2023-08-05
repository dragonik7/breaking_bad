<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up(): void
	{
		Schema::create('characters', function (Blueprint $table)
		{
			$table->id();
			$table->string('name');
			$table->date('birthday');
			$table->json('occupations_json');
			$table->string('img');
			$table->string('nickname');
			$table->string('portrayed');
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('characters');
	}
};
