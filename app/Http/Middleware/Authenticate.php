<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
        if (! $request->expectsJson()) {
            $user = User::find($request->route('id'));

            if ($user->hasVerifiedEmail()) {
                return redirect(env('MAIL_REDIRECT') . '/email/verify/already-success');
            }
            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }
            return env('MAIL_REDIRECT');
        }
    }
}
