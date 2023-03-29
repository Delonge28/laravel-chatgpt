<?php

namespace Delonge28\LaravelChatGPT\Middleware;

use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests;

class RateLimitMiddleware extends ThrottleRequests
{
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    {
        if (config('laravel-chatgpt.rate_limiting.enabled')) {
            $maxAttempts = config('laravel-chatgpt.rate_limiting.requests');
            $decayMinutes = config('laravel-chatgpt.rate_limiting.duration') / 60;
        } else {
            $maxAttempts = 0; // Rate limiting disabled
        }

        return parent::handle($request, $next, $maxAttempts, $decayMinutes, $prefix);
    }
}