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
        return view('dashboard', compact('totalGastosMensualesFormateado', 'totalUsuarios', 'totalActivos', 'mantenimientosProximos'));
    }
}
