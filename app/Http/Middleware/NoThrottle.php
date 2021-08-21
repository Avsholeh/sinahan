<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests;

class NoThrottle extends ThrottleRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 0)
    {
        if (config("app.app_config")["nothrottle"] ?? false) {
            $response = $next($request);
            return $this->addHeaders(
                $response, $maxAttempts,
                $maxAttempts
            );
        }
        return parent::handle($request, $next, $maxAttempts, $decayMinutes);
    }
}
