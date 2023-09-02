<?php

namespace App\Http\Controllers;

use App\Http\Resources\Quotes\QuoteShowResource;
use App\Http\Services\QuoteService;
use Illuminate\Http\Request;

class QuoteController extends Controller {

	public function __construct(protected QuoteService $service) {}

	public function index(Request $request) {
		return QuoteShowResource::collection($this->service->index($request->get('page', 1)));
	}

	public function random_quotes() {
		$quotes = $this->service->get_random_character();
		return new QuoteShowResource($quotes);
	}
}
