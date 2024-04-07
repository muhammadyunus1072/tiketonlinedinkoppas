<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\PermissionHelper;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Page\ConcertParticipantRepository;

class Eligible
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!ConcertParticipantRepository::is_eligible()) {
            return redirect()->route('index');
        }
        
        return $next($request);
    }
}
