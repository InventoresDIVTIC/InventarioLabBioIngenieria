<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Activo;
use App\Models\Servicios;
use App\Models\ActivoServicios;
use Carbon\Carbon;

class GenerarServicios extends Command
{
    protected $signature = 'generar:servicios';
    protected $description = 'Generar servicios para activos según su frecuencia y last_mprev';

    public function handle()
    {
        $activosServicios = ActivoServicios::all();

        foreach ($activosServicios as $activoServicio) {
            $activo = $activoServicio->activo;

            $nextServiceDate = $this->calculateNextServiceDate($activoServicio);

            // Verificar si se necesita generar un servicio
            if ($nextServiceDate <= Carbon::now()) {
                // Crear un nuevo registro de Servicio
                $userId = $activo->user_id;
                $userName = $activo->user->name;

                $servicio = new Servicios();
                $servicio->user_id = $userId;
                $servicio->user_name = $userName;
                $servicio->active_name = $activo->type; // Ajusta según tus campos
                $servicio->active_model = $activo->model; // Ajusta según tus campos
                $servicio->active_sublocation = $activo->sublocation; // Ajusta según tus campos
                $servicio->status = "Generado automáticamente";
                $servicio->scheduled_date = $nextServiceDate;

                $servicio->save();

                // Actualizar el campo next_mprev en la tabla de activos_servicios
                $activoServicio->next_mprev = $nextServiceDate;
                $activoServicio->save();
            }
        }

        $this->info('Servicios generados exitosamente.');
    }

    protected function calculateNextServiceDate($activoServicio)
    {
        // Verificar si el activo está definido
        if ($activoServicio->activo) {
            // Obtener la frecuencia y el último mantenimiento previo del activo
            $frequencyMprev = $activoServicio->activo->frequency_mprev;
            $lastMprev = $activoServicio->last_mprev;

            // Verificar si la frecuencia y el último mantenimiento previo están definidos
            if ($frequencyMprev && $lastMprev) {
                // Determinar la próxima fecha de servicio según la frecuencia y last_mprev
                switch ($frequencyMprev) {
                    case 'Anual':
                        return $lastMprev->copy()->addYear();
                    case 'Mensual':
                        return $lastMprev->copy()->addMonth();
                    case 'Semanal':
                        return $lastMprev->copy()->addWeek();
                    case 'Trimestral':
                        return $lastMprev->copy()->addMonths(3);
                    default:
                        return null;
                }
            }
        }

        // Si el activo no está definido o no hay frecuencia o último mantenimiento previo, generar un servicio anual
        return Carbon::now()->addYear();
    }
}
