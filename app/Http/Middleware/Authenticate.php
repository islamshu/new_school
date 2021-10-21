<?php

namespace App\Http\Middleware;
use Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            $path = Request::getPathInfo();

$contains = Str::contains($path, 'father');
            if($contains == true ){
                return route('father.get_login');
            }
    $containsss = Str::contains($path, 'madares-kings');
     if($containsss == true ){
                return route('get_login');
            }
        
                        return route('home');
    
       

        }
    }
}
