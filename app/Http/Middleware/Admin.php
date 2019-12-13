<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Admin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		return $next($request);
		// if (Auth::user() && Auth::user()->admin == 'admin') {
		// 	return $next($request);
		// }
		// abort(404);
	}
}
