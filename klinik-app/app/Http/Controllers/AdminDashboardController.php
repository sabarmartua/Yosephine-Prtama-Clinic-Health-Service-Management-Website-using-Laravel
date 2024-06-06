<?php

namespace App\Http\Controllers;

use App\Models\AntrianOnline;
use App\Models\CutiDokter;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Treatment;
use Carbon\Carbon;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Fetch treatment data, grouped by month
        $treatmentData = Treatment::select(
            DB::raw('MONTH(tanggal_pengobatan) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->whereYear('tanggal_pengobatan', $currentYear)
            ->groupBy(DB::raw('MONTH(tanggal_pengobatan)'))
            ->orderBy('month')
            ->get();

        // Prepare the data for the visitors chart
        $chartData = array_fill(0, 12, 0);
        foreach ($treatmentData as $data) {
            $chartData[$data->month - 1] = $data->count;
        }

        // Fetch treatment data for medication cost, grouped by month
        $medicationCostData = Treatment::select(
            DB::raw('MONTH(tanggal_pengobatan) as month'),
            DB::raw('SUM(harga_obat) as total_cost')
        )
            ->whereYear('tanggal_pengobatan', $currentYear)
            ->groupBy(DB::raw('MONTH(tanggal_pengobatan)'))
            ->orderBy('month')
            ->get();

        // Prepare the data for medication cost chart
        $medicationCostChartData = array_fill(0, 12, 0);
        foreach ($medicationCostData as $data) {
            $medicationCostChartData[$data->month - 1] = $data->total_cost;
        }

        // Fetch treatment data for treatment cost, grouped by month
        $treatmentCostData = Treatment::select(
            DB::raw('MONTH(tanggal_pengobatan) as month'),
            DB::raw('SUM(harga_perawatan) as total_cost')
        )
            ->whereYear('tanggal_pengobatan', $currentYear)
            ->groupBy(DB::raw('MONTH(tanggal_pengobatan)'))
            ->orderBy('month')
            ->get();

        // Prepare the data for treatment cost chart
        $treatmentCostChartData = array_fill(0, 12, 0);
        foreach ($treatmentCostData as $data) {
            $treatmentCostChartData[$data->month - 1] = $data->total_cost;
        }

        // Fetch today's queue count
        $today = Carbon::today()->format('Y-m-d');
        $count = AntrianOnline::whereDate('tanggal_antrian', $today)->count();

        //Count 
        $pegawaiCount = Pegawai::count();
        $artikelCount = Artikel::count();

        $today = Carbon::today();

        // Calculate the date one month from now
        $nextMonth = $today->copy()->addMonth();

        // Fetch leave dates that start within the next month
        $leaves = CutiDokter::where('tanggal_mulai', '>=', $today)
            ->where('tanggal_mulai', '<=', $nextMonth)
            ->count();

        return view('Admin.dashboard', compact('chartData', 'medicationCostChartData', 'treatmentCostChartData', 'count', 'pegawaiCount', 'artikelCount', 'leaves'));
    }
}
