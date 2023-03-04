<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Active
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    if ($request->user()->status == 0) {
      return response()->json([
        'message' => 'Your account is not active yet.',
        'status' => 'error'
      ]);
    }

    return $next($request);
  }
}
