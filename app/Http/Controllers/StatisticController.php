<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class StatisticController extends Controller {

    public function numberOfRequestUser() {
        $numberOfRequest = (int) Cache::get('number-of-request:user-' . auth()->id());
        return response()->json(['number of requests' => $numberOfRequest]);
    }

    public function numberOfRequestUsers() {
        $numberOfRequest = (int) Cache::get('number-of-request:users');
        return response()->json(['number of requests' => $numberOfRequest]);
    }
}
