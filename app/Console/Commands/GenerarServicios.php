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
            $activo = new Activo();

            if ($activo) {
                $nextServiceDate = $this->calculateNextServiceDate($activoServicio);

                // Verificar si se necesita generar un servicio
                //if ($nextServiceDate <= Carbon::now()) { // descomentar esto para aplicar la condición
                    // Crear un nuevo registro de Servicio
                    $userId = "0";
                    $userName = "Generado automáticamente";

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
              //  }
            //} else {
                //$this->warn('El activo para el servicio no está definido.');
            }
        }

        $this->info('Servicios generados exitosamente.');
    }

    protected function calculateNextServiceDate($activoServicio)
    {
        $activo = $activoServicio->activo; // Obtener el activo

        if ($activo) {
            $frequencyMprev = $activo->frequency_mprev;
            $lastMprev = $activoServicio->last_mprev;

            if ($frequencyMprev && $lastMprev) {
                switch ($frequencyMprev) {
                    case 'Anual':
                        return $lastMprev->copy()->addYear();
                    case 'Mensual':
                        return $lastMprev->copy()->addMonth();
                    case 'Semanal':
                        return $lastMprev->copy()->addWeek();
                    case 'Trimestral':
                        return $lastMprev->copy()->addMonths(3);
                    case 'Semestral':
                        return $lastMprev->copy()->addMonths(6);
                    default:
                        return null;
                }
            }
        }

        // Si el activo o los datos relevantes no están definidos, generar un servicio anual por defecto
        return Carbon::now()->addYear();
    }
}
