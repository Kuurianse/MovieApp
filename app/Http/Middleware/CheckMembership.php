<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->membership == true){ 
            // return response()->json([
            //     'message' => 'You are not a member'
            // ], 403);
            return redirect('/pricing');
        }

        // Contoh Before and After Response
        Log::info('Before request:', [
            'url' => $request->url(),
            'params' => $request->all(),
        ]);

        $response = $next($request);

        // Simulate some processing time
        sleep(1);

        Log::info('After request:', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent(),
        ]);

        return $response;
    }
}
