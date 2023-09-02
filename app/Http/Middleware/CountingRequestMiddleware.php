<?php

namespace App\Http\Middleware;

use App\Events\ApiCountRequestEvent;
use Closure;
use Illuminate\Http\Request;

class CountingRequestMiddleware {

	public function handle(Request $request, Closure $next) {
		event(new ApiCountRequestEvent(request()->user()));
		return $next($request);
	}
}
