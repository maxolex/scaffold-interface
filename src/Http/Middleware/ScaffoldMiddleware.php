<?php

namespace Maxolex\ScaffoldInterface\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class ScaffoldMiddleware.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class ScaffoldMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->segment(1) == 'scaffold') {

            // allowed env-s check
            $allowed = collect(config('maxolex.config.env'))
                            ->contains(config('app.env'));

            if (!$allowed) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
