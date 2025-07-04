<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->route('locale');
        if (in_array($locale, ['en', 'fr'])) {
            App::setLocale($locale);
        } else {
            App::setLocale(config('app.locale')); // fallback if needed
        }
        return $next($request);
    }
}
