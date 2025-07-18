<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;
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
public function boot()
{
    View::composer('layouts.*', function ($view) {
        if (Auth::check()) {
            $userId = Auth::id();

            $notificaciones = Notificacion::where(function ($query) use ($userId) {
                    $query->whereRaw("JSON_EXTRACT(data, '$.user_id') = ?", [$userId])
                          ->orWhereRaw("JSON_EXTRACT(data, '$.usuario_id') = ?", [$userId]);
                })
                ->latest()
                ->take(10)
                ->get();

            $noLeidas = $notificaciones->where('leida', false);

            $view->with('notificaciones', $notificaciones)
                 ->with('notificacionesNoLeidas', $noLeidas);
        }
    });
}

}
