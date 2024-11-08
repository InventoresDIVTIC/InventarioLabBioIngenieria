<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ServiciosGastos;
use App\Models\ActivoFinanzas;
use App\Models\User;
use App\Models\Activo;
use App\Models\ActivoServicios;
use App\Models\Servicios;
use App\Models\ServiciosDetalles;
use App\Models\ServiciosFirmas;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewServiceCreated;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function MetricasDashboard()
    {
        // Obtener el primer día y el último día del mes actual
        $primerDiaMes = Carbon::now()->startOfMonth();
        $ultimoDiaMes = Carbon::now()->endOfMonth();

        // Obtener todos los gastos de servicios para el mes actual
        $gastosServicios = ServiciosGastos::whereBetween('updated_at', [$primerDiaMes, $ultimoDiaMes])->get();

        // Calcular la diferencia total en los gastos de servicios
        $diferenciaServiceExpense = $gastosServicios->sum(function ($gasto) {
            return $gasto->getServiceExpenseDifference();
        });

        $diferenciaPartsExpense = $gastosServicios->sum(function ($gasto) {
            return $gasto->getPartsExpenseDifference();
        });

        $diferenciaTotalGastosServicios = $diferenciaServiceExpense + $diferenciaPartsExpense;

        // Obtener todos los activos financieros para el mes actual
        $activosFinanzas = ActivoFinanzas::whereBetween('updated_at', [$primerDiaMes, $ultimoDiaMes])->get();

        // Calcular la diferencia total en los activos financieros
        $diferenciaActivosFinanzas = $activosFinanzas->sum(function ($activo) {
            return $activo->getPriceDifference();
        });

        $totalGastosMensuales = $diferenciaTotalGastosServicios + $diferenciaActivosFinanzas;

        // Formatear el total de gastos mensuales
        $totalGastosMensualesFormateado = '$' . number_format($totalGastosMensuales, 2);

        // Obtener el recuento de usuarios
        $totalUsuarios = User::count();

        // Obtener el recuento de activos
        $totalActivos = Activo::count();


        // Obtener el recuento de activos funcionales
        $totalActivosFuncionales = Activo::whereIn('status', ['funcional', 'en stock'])->count(); // Asumiendo que 'status' es el campo que define el estado de los activos

        // Obtener el recuento de activos funcionales
        $totalActivosMantenimiento = Activo::whereIn('status', ['En mantenimiento', 'Pendiente' , 'En revision'])->count();

        // Obtener el recuento de activos funcionales
        $totalActivosBaja = Activo::whereIn('status', ['Baja', 'No funcional'])->count();

        // Calcular el porcentaje de activos funcionales
        $porcentajeFuncionales = ($totalActivos > 0) ? ($totalActivosFuncionales / $totalActivos) * 100 : 0;

        // Calcular el porcentaje de activos funcionales
        $porcentajeMantenimiento = ($totalActivos > 0) ? ($totalActivosMantenimiento / $totalActivos) * 100 : 0;

        // Calcular el porcentaje de activos funcionales
        $porcentajeBaja = ($totalActivos > 0) ? ($totalActivosBaja / $totalActivos) * 100 : 0;

        // Obtener los mantenimientos preventivos próximos de este mes
        $mantenimientosProximos = DB::table('activos')
            ->join('activos_servicios', 'activos.id', '=', 'activos_servicios.id')
            ->where('activos_servicios.next_mprev', '!=', '')
            ->whereMonth('activos_servicios.next_mprev', Carbon::now()->month)
            ->whereYear('activos_servicios.next_mprev', Carbon::now()->year)
            ->orderBy('activos_servicios.next_mprev')
            ->select('activos.id','activos.type','activos_servicios.next_mprev')
            ->get();

        // Enviar todas las variables a la vista
        return view('dashboard', compact('totalGastosMensualesFormateado', 'totalUsuarios', 'totalActivos', 'mantenimientosProximos', 'porcentajeFuncionales', 'porcentajeMantenimiento', 'porcentajeBaja'));
    }

    public function actualizarNextMprev()
    {
        // Obtener los activos que tienen un próximo mantenimiento preventivo (next_mprev) definido
        $activos = ActivoServicios::whereNotNull('next_mprev')->get();
        $hoy = Carbon::now();

        foreach ($activos as $activo) {
            $nextMprevDate = Carbon::parse($activo->next_mprev); // Fecha actual del próximo mantenimiento
            $lastMprevDate = Carbon::parse($activo->last_mprev); // Usa la fecha de mantenimiento pasada

            // Si last_mprev no está definido, asignar hoy
            if (!$lastMprevDate) {
                $lastMprevDate = $hoy; // Usar la fecha actual solo si last_mprev no existe
            }

            // Calcular los intervalos necesarios para que next_mprev sea mayor que hoy
            if ($hoy->greaterThanOrEqualTo($nextMprevDate)) {
                // Obtener la diferencia entre hoy y next_mprev
                $diffDays = $nextMprevDate->diffInDays($hoy);
                $increment = 0;

                // Determinar cuántos intervalos se necesitan
                switch ($activo->frecuency_mprev) {
                    case 'Anual':
                        $increment = ceil($diffDays / 365);
                        $nextMprevDate = $nextMprevDate->addYears($increment);
                        break;
                    case 'Semestral':
                        $increment = ceil($diffDays / 182.5); // Promedio de días en un semestre
                        $nextMprevDate = $nextMprevDate->addMonths(6 * $increment);
                        break;
                    case 'Trimestral':
                        $increment = ceil($diffDays / 91.25); // Promedio de días en un trimestre
                        $nextMprevDate = $nextMprevDate->addMonths(3 * $increment);
                        break;
                    case 'Mensual':
                        $increment = ceil($diffDays / 30); // Promedio de días en un mes
                        $nextMprevDate = $nextMprevDate->addMonths($increment);
                        break;
                    case 'Semanal':
                        $increment = ceil($diffDays / 7); // Promedio de días en una semana
                        $nextMprevDate = $nextMprevDate->addWeeks($increment);
                        break;
                    default:
                        break; // Si es "Por definir" u otra cosa, no hacer nada
                }

                // Antes de actualizar next_mprev, guardar su valor en last_mprev
                $activo->last_mprev = $activo->next_mprev;

                // Guardar la nueva fecha de mantenimiento solo si es mayor que la fecha actual
                $activo->next_mprev = $nextMprevDate;
                $activo->save();
                $this->crearServicio($activo);
            }
        }
        return redirect()->back()->with('success', 'Mantenimientos preventivos actualizados correctamente.');
    }

// Función separada para crear el servicio
protected function crearServicio($activo)
{
    // Verificar si ya existe un servicio para el mismo activo y la misma fecha de mantenimiento
    $servicioExistente = Servicios::where('active_id', $activo->id)
                                  ->where('scheduled_date', $activo->next_mprev)
                                  ->exists();

    // Si no existe un servicio, crear uno nuevo
    if (!$servicioExistente) {
        $activodata = Activo::find($activo->id);
        $user_id = 0;
        $user_name = 'Bot';

        $service = new Servicios();
        $service->user_id = $user_id;
        $service->user_name = $user_name;
        $service->status = 'Generado automaticamente';
        $service->services_type = 'Mantenimiento';
        $service->active_name = $activodata->type;
        $service->active_model = $activodata->model;
        $service->active_sublocation = $activodata->sublocation;
        $service->active_id = $activo->id;
        $service->scheduled_date = $activo->next_mprev;
        $service->assigned_engineer = 'Por asignar';
        $service->service_type = 'Mantenimiento Preventivo';

        $service->save();

        // Guardar registros relacionados
        $ServiciosDetalles = new ServiciosDetalles();
        $ServiciosDetalles->id = $service->id;
        $ServiciosDetalles->start_date = $activo->next_mprev;
        $ServiciosDetalles->save();

        $ServiciosFirmas = new ServiciosFirmas();
        $ServiciosFirmas->id = $service->id;
        $ServiciosFirmas->save();

        $ServiciosGastos = new ServiciosGastos();
        $ServiciosGastos->id = $service->id;
        $ServiciosGastos->save();

        // Notificar a los admins
        $admins = User::role('Admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewServiceCreated($service));
        }
    }
}
}
