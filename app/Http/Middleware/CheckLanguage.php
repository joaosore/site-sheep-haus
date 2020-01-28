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
        $COOKIElocale = (isset($_COOKIE["user_locale"])) ? $_COOKIE["user_locale"] : null;
        $BROWSERlocale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        if ($URLlocale) {
            \App::setLocale($URLlocale);
            setcookie("user_locale", $URLlocale, time()+3600*100);
            
        } else if ($COOKIElocale) {
            \App::setLocale($COOKIElocale);

        } else if ($BROWSERlocale) {
            $acceptLang = ['pt', 'en', 'es'];
            $BROWSERlocale = in_array($BROWSERlocale, $acceptLang) ? $BROWSERlocale : 'pt';
            \App::setLocale($BROWSERlocale);
            setcookie("user_locale", $BROWSERlocale, time()+3600*100);
        } 

        return $next($request);
    }
}
