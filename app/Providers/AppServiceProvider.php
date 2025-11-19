<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route; // <--- EZT KELL HOZZÁADNI
use Laravel\Sanctum\Http\Middleware\CheckAbilities; // <--- EZT KELL HOZZÁADNI
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Az alapértelmezett string hossza 191 karakterre csökkentése
        Schema::defaultStringLength(191);
        //Middleware regisztráció
        Route::aliasMiddleware('ability', CheckAbilities::class);

        // 2. KIVÉTELKEZELÉS REGISZTRÁCIÓJA
        Exceptions::renderable(function (AccessDeniedHttpException $e, $request) {
            $message = $e->getMessage() ?? 'Access denied.';
            // Csak API kérésekre fusson le
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => $message
                ], 403);
            }
        });

        //Policy regisztráció
        Gate::policy(User::class, UserPolicy::class);
        
    }
}
