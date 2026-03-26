<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class VerifyRestaurantAccess
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        try {
            $user = auth()->user();
        } catch (\Exception $e) {

            return $next($request);
        }

        if (is_null($user?->restaurant_id) && is_null($user?->branch_id)) {
            return $next($request);
        }

        if (!$user->isRestaurantApproved() && Route::currentRouteName() !== 'account_unverified') {
            return redirect()->route('account_unverified');
        }

        if (!$user?->isRestaurantActive()) {
            Auth::logout();
            session()->flush();
            return redirect()->route('login')->withErrors(['email' => __('Restaurant is inactive. Contact admin.')]);
        }

        if ($user->restaurant && $user->restaurant->isAccessExpired()) {
            Auth::logout();
            session()->flush();
            return redirect()->route('login')->withErrors(['email' => __('Your access has expired. Please contact admin.')]);
        }

        // Check license expiry (subscription-based)
        if ($user->restaurant && $user->restaurant->isLicenseExpired()) {
            // Allow billing/pricing routes so they can renew
            $allowedRoutes = ['pricing.plan', 'settings.index', 'logout'];
            if (!$request->routeIs($allowedRoutes)) {
                return redirect()->route('pricing.plan')
                    ->withErrors(['plan' => __('Your subscription has expired. Please renew your plan to continue.')]);
            }
        }

        return $next($request);
    }
}
