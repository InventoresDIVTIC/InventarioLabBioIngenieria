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
        {
            // Obtener el primer día y el último día del mes actual
            $primerDiaMes = Carbon::now()->startOfMonth();
            $ultimoDiaMes = Carbon::now()->endOfMonth();

            // Calcular la suma de los gastos de servicios para el mes actual
            $gastosServicios = ServiciosGastos::whereBetween('updated_at', [$primerDiaMes, $ultimoDiaMes])
                ->selectRaw('SUM(CAST(service_expense AS DECIMAL(10, 2))) AS total_service_expense, SUM(CAST(parts_expense AS DECIMAL(10, 2))) AS total_parts_expense')
                ->first();

            $totalGastosServicios = $gastosServicios->total_service_expense + $gastosServicios->total_parts_expense;

            // Calcular la suma de los activos financieros para el mes actual
            $activosFinanzas = ActivoFinanzas::whereBetween('updated_at', [$primerDiaMes, $ultimoDiaMes])
                ->selectRaw('SUM(CAST(price AS DECIMAL(10, 2))) AS total_price')
                ->first();

            $totalGastosMensuales = $totalGastosServicios + $activosFinanzas->total_price;

            // Formatear el total de gastos mensuales
            $totalGastosMensualesFormateado = '$' . number_format($totalGastosMensuales, 0);

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
            ->select('activos.type', 'activos_servicios.next_mprev')
            ->get();

            // Enviar todas las variables a la vista
            return view('dashboard', compact('totalGastosMensualesFormateado', 'totalUsuarios', 'totalActivos', 'mantenimientosProximos'));

        }
    }
}
