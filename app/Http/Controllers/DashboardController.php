<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ServiciosGastos;
use App\Models\ActivoFinanzas;
use App\Models\User;
use App\Models\Activo;
use App\Models\ActivoServicios;
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
            $lastMprevDate = Carbon::parse($activo->last_mprev) ?: Carbon::now(); // Usa la fecha de mantenimiento pasada o la actual si no existe

            // Revisar si la fecha actual ha pasado de next_mprev
            if ($hoy->greaterThan($nextMprevDate)) {
                // Actualizar next_mprev según la frecuencia
                switch ($activo->frecuency_mprev) {
                    case 'Anual':
                        $nextMprevDate = $lastMprevDate->addYear();
                        break;
                    case 'Semestral':
                        $nextMprevDate = $lastMprevDate->addMonths(6);
                        break;
                    case 'Trimestral':
                        $nextMprevDate = $lastMprevDate->addMonths(3);
                        break;
                    case 'Mensual':
                        $nextMprevDate = $lastMprevDate->addMonth();
                        break;
                    case 'Semanal':
                        $nextMprevDate = $lastMprevDate->addWeek();
                        break;
                    default:
                        break; // Si es "Por definir" u otra cosa, no hacer nada
                }

                // Guardar la nueva fecha de mantenimiento
                $activo->next_mprev = $nextMprevDate;
                $activo->save();
            }
        }
        return redirect()->back()->with('success');
    }
}
