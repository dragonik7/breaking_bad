<?php

namespace App\Listeners;

use App\Events\ApiCountRequestEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ApiRequestListener implements ShouldQueue {

    use InteractsWithQueue, Queueable;

    public function handle(ApiCountRequestEvent $event): void {
        $userId = $event->user->id;
        $key = 'number-of-request:user-' . $userId;
        Cache::increment('number-of-request:users');
        Cache::increment($key);
    }
}
