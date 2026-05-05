<?php

namespace App\Http\Middleware;

use Filament\Http\Middleware\Authenticate as BaseAuthenticate;
use Illuminate\Http\Request;

class FilamentAuthenticate extends BaseAuthenticate
{
    protected function redirectTo(Request $request): ?string
    {
        return route('login');
    }
}
