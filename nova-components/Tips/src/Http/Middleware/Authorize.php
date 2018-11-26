<?php

namespace Wangkai\Tips\Http\Middleware;

use Wangkai\Tips\Tips;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(Tips::class)->authorize($request) ? $next($request) : abort(403);
    }
}
