<?php

namespace App\Http\Middleware;

use Closure;

class CheckLanguage
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
        $URLlocale = $request->input('locale');

        if ($URLlocale) {
            \App::setLocale($URLlocale);
            setcookie("user_locale", $URLlocale, time()+3600*100);  /* expira em 100 horas */
        } else {
            $COOKIElocale = $_COOKIE["user_locale"];
            if ($COOKIElocale) {
                \App::setLocale($COOKIElocale);
            }
        }

        return $next($request);
    }
}
