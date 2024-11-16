<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuthenticatedSessionController extends \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('doctor')) {
            return redirect()->route('doctor.panel');
        }

        // Redirección por defecto (Dashboard para otros roles)
        return redirect()->route('dashboard');
    }
}
