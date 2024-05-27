<?php

namespace App\Http\Middleware;

use App\Models\Collection;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;

class CheckIsCollection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->headers->get('Authorization');
        if (!$collection = Collection::whereToken( $token)->first()) return throw new UnauthorizedException();

        $request->merge(['collection' => $collection]);

        return $next($request);
    }
}
