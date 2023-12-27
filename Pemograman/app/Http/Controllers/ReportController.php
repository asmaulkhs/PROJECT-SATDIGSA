<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\surat;
use App\Models\tujuan;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ReportController extends Controller
{
    public function index(){
        $tujuans = tujuan::all();
        if (auth()->user()->jabatan_id === 5){
            return view('report.index',[
                'title'=> 'Laporan',
                'tujuans' => $tujuans,
            ])->with('layout', 'tatausaha.main');
        }elseif(auth()->user()->jabatan_id === 6){
            return view('report.index',[
                'title'=> 'Laporan',
                'tujuans' => $tujuans,
            ])->with('layout', 'resepsionis.main');
        }else{
            return view('report.index',[
                'title'=> 'Laporan',
                'tujuans' => $tujuans,
            ])->with('layout', 'unit.main');  
        }
    }
    public function exportPDF(Request $request)
    {
        $jabatan = auth()->user()->jabatan_id;
        // Validasi input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $formattedStartDate = date('Ymd', strtotime($request->input('start_date')));
        $formattedEndDate = date('Ymd', strtotime($request->input('end_date')));
        
        // Ambil data surat berdasarkan rentang waktu
        if($jabatan == '5' || $jabatan == '6'){
            
            $tujuan = $request->input('tujuan');
            if($tujuan == '10'){
                $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                ->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();
                
                $filename = 'laporan_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Semua Unit';
            }elseif($tujuan == '1'){
                $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','1')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();
                
                $filename = 'laporan_Akademik_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Akademik';
            }elseif($tujuan == '2'){
                $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','2')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();

                $filename = 'laporan_Mahasiswa_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Mahasiswa';
            }elseif($tujuan == '3'){
                $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','3')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();

                $filename = 'laporan_Kerjasama_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Kerjasama';
            }elseif($tujuan == '4'){
                $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','4')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();

                $filename = 'laporan_Kepegawaian_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Kepegawaian';
            }

        }elseif($jabatan == '1'){
            $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','1')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();
                
                $filename = 'laporan_Akademik_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Akademik';
        }elseif($jabatan == '2'){
            $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','2')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();

                $filename = 'laporan_Mahasiswa_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Mahasiswa';
        }elseif($jabatan == '3'){
            $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','3')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();

                $filename = 'laporan_Kerjasama_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Kerjasama';
        }elseif($jabatan == '4'){
            $suratData = Surat::where('waktu', '>=', $request->input('start_date')) ->where('waktu', '<=', $request->input('end_date').' 23:59:59')
                    ->where('tujuan_id','4')->orderBy('waktu','asc')->where('status_id','3')->orWhere('status_id','4')->get();

                $filename = 'laporan_Kepegawaian_' . $formattedStartDate . '-' . $formattedEndDate . '.pdf';
                $title = 'Unit Kepegawaian';
        }
        
        // $suratData = Surat::whereBetween('waktu', [$request->input('start_date'), $request->input('end_date')])
        //         ->orderBy('waktu','asc')->get();

        // Tampilkan data dalam tabel
        $data = [
            'suratData' => $suratData,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'title' => $title,
            'filename' =>$filename,
        ];

        // Tampilkan view PDF
        $pdf = FacadePdf::loadView('report.result', $data);
        return $pdf->download($filename);
    }
}
