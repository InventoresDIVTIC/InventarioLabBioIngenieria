<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Activo;
use App\Models\Servicios;
use App\Models\ActivoServicios;
use App\Models\ServiciosDetalles;
use App\Models\ServiciosFirmas;
use App\Models\ServiciosGastos;
use Carbon\Carbon;

class GenerarServicios extends Command
{
    protected $signature = 'generar:servicios';
    protected $description = 'Generar servicios para activos según su frecuencia y last_mprev';

    public function handle()
    {
    // Obtener todos los activos que requieren servicio
        $activos = Activo::all();

        foreach ($activos as $activo) {
            // Obtener el activo_servicio relacionado
            $activoServicio = ActivoServicios::where('id', $activo->id)->first();

            if ($activoServicio) {
                // Generar la fecha programada para el próximo servicio
                $nextServiceDate = $activoServicio->next_mprev;

            // Crear un nuevo servicio
            $servicio = new Servicios();
            $servicio->user_id = $activo->user_id;  // Suponiendo que el activo tiene un user_id
            $servicio->user_name = $activo->user_name; // Suponiendo que el activo tiene un user_name
            $servicio->active_name = $activo->type; // Ajusta según tus campos
            $servicio->active_model = $activo->model; // Ajusta según tus campos
            $servicio->active_sublocation = $activo->sublocation; // Ajusta según tus campos
            $servicio->status = 'Generado automáticamente';
            $servicio->scheduled_date = $nextServiceDate;
            $servicio->save(); // Guardar primero el servicio para obtener su ID

            // Usar el ID generado del servicio para las otras tablas
            $servicioId = $servicio->id;

            $ServiciosDetalles = new ServiciosDetalles();
            $ServiciosDetalles->id = $servicioId; // Usar el ID del servicio
            $ServiciosDetalles->save(); // Guardar los detalles del servicio

            $ServiciosFirmas = new ServiciosFirmas();
            $ServiciosFirmas->id = $servicioId; // Usar el ID del servicio
            $ServiciosFirmas->save(); // Guardar las firmas del servicio

            $ServiciosGastos = new ServiciosGastos();
            $ServiciosGastos->id = $servicioId; // Usar el ID del servicio
            $ServiciosGastos->save(); // Guardar los gastos del servicio
            }
        }

        $this->info('Servicios generados automáticamente.');
    }


    protected function calculateNextServiceDate($activoServicio)
    {
        $activo = $activoServicio->activo; // Obtener el activo

        if ($activo) {
            $frequencyMprev = $activo->frequency_mprev;
            $scheduled_date = $activoServicio->scheduled_date;

            if ($frequencyMprev && $scheduled_date) {
                switch ($frequencyMprev) {
                    case 'Anual':
                        return $scheduled_date->copy()->addYear();
                    case 'Mensual':
                        return $scheduled_date->copy()->addMonth();
                    case 'Semanal':
                        return $scheduled_date->copy()->addWeek();
                    case 'Trimestral':
                        return $scheduled_date->copy()->addMonths(3);
                    case 'Semestral':
                        return $scheduled_date->copy()->addMonths(6);
                    default:
                        return null;
                }
            }
        }

        // Si el activo o los datos relevantes no están definidos, generar un servicio anual por defecto
        return Carbon::now()->addYear();
    }
}
