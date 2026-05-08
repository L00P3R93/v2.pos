<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DetectNPlusOneQueries
{
    private const QUERY_THRESHOLD = 10;

    private const LOG_CHANNEL = 'n1_queries';

    /**
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! app()->isLocal()) {
            return $next($request);
        }

        $response = $next($request);

        $queries = DB::getQueryLog();

        if (count($queries) > self::QUERY_THRESHOLD) {
            Log::channel(self::LOG_CHANNEL)->warning('Possible N+1 detected', [
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'query_count' => count($queries),
                'queries' => collect($queries)->map(fn ($q) => [
                    'sql' => $q['query'],
                    'bindings' => $q['bindings'],
                    'time_ms' => round($q['time'], 2),
                ])->all(),
            ]);
        }

        return $response;
    }
}
