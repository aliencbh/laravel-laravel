<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class middle28_2 {

  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response {
    if (route('name is route 28_1') == url()->full()) {
      return to_route('name is route 28_2', ['route' => '28_2']);
    }

    echo url()->current() . ', middleware : 28_2<br />';
    return response('i am middle 28_2', 282);
  }
}
