<?php

namespace App\Http\Controllers;

use App\Http\Resources\Characters\CharacterIndexResource;
use App\Http\Services\CharactersService;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
	public function __construct(protected CharactersService $service)
	{
	}

	public function index(Request $request)
	{
		$characters = $this->service->index($request->get('page', 1), $request->get('name'));
		return CharacterIndexResource::collection($characters);
	}
}
