<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Surat;
use App\Charts\SampleChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function chart() {
        $data = [];
        $labels = [];
        $currentYear = date('Y');
        $currentMonth = date('n');
        
        $year = 2023; // Tahun mulai 
        $month = 1;   // Bulan mulai 
        

        while ($year < $currentYear || ($year == $currentYear && $month <= $currentMonth)) {
            $monthlyTotal = Surat::whereMonth('waktu', $month)
                                    ->whereYear('waktu', $year)
                                    ->count();

            $data[] = $monthlyTotal;
            $namaBulan = date('F', mktime(0, 0, 0, $month, 1));
            $labels[] = "$year-$namaBulan";

            $month++;
            if ($month > 12) {
                $month = 1;
                $year++;
            }
        }

        
        $chart = new SampleChart;
        $chart->title('Jumlah Surat per Bulan');
        $chart->labels($labels);
        $chart->dataset('Jumlah Surat', 'bar', $data)->backgroundColor('#67A3D9');
        return $chart;
    }
    public function index()
    {
        
        $jabatan = auth()->user()->jabatan_id;
        
        if($jabatan == '5'){
            $chart = $this->chart();
            return view('tatausaha.dashboard', [
                'chart'=> $chart,
                'title'=> 'Home',
            ]);

        }elseif($jabatan == '1'||$jabatan == '2'||$jabatan == '3'||$jabatan == '4'){
            $chart = $this->chart();
            return view('unit.dashboard', [
                'chart'=> $chart,
                'title'=> 'Home',
            ]);
        }elseif($jabatan == '6'){
            $today = Carbon::today('Asia/Jakarta');
        
            return view('resepsionis.dashboard', [
                'title'=> 'Home',
                'today'=> surat::has('tamu')->where('status_id', '3')->whereDate('waktu',$today)->orderBy('waktu','asc')->get(),
            ]);
        }
    }

}
