<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log; // 👈 Asegúrate de importar Log

class Kernel extends ConsoleKernel
{
    /**
     * Registra los comandos programados.
     */
    public function schedule(Schedule $schedule): void
    {
        // Test: registrar si Laravel ejecuta este método
        Log::info('[✔] schedule() fue ejecutado ✅');

        // Ejecuta el comando todos los días a la medianoche
        $schedule->exec('php artisan formularios:eliminar-inactivos')->everyMinute();



    }

    /**
     * Registra los comandos Artisan.
     */
public function commands(): void
{
    $this->load(__DIR__.'/Commands');

    $this->commands([
        \App\Console\Commands\EliminarFormulariosInactivos::class, // 👈 forzado
    ]);

    require base_path('routes/console.php');
}


}
