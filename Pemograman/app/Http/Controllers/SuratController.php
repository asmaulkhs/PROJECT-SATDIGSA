<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\surat;
use App\Models\tujuan;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(){

        return view('tatausaha.arsip', [
            'title' => 'Arsip',
            "arsip"=> surat::latest()->search(request(['search', 'status']))->paginate(15),
        ]);
    }

    public function show(surat $surat){
        $carbonDateTime = Carbon::parse($surat->waktu);
        return view('tatausaha.surat',[
            'title' => 'Arsip',
            'surat'=> $surat,
            'date' => $carbonDateTime->toDateString(),
            'time' => $carbonDateTime->toTimeString()
        ]);
    }

    public function acc(Request $request, surat $surat){
        if ($request->input('action') === '1') {
            $surat->status_id = '2';
            $surat->save();
            return redirect('/arsip')->with('status', 'Surat Berhasil Diajukan!');
        }elseif ($request->input('action') === '2') {
            $surat->delete();
            return redirect('/arsip')->with('status', 'Surat Berhasil Dihapus!');
        }
    }
    public function edit(Request $request, surat $surat){
        $carbonDateTime = Carbon::parse($surat->waktu);
        $tujuans = tujuan::all();
            $surat = $surat;
            return view('tatausaha.edit',[
                'title' => 'Edit Surat',
                'tujuans' => $tujuans,
                'surat' => $surat,
                'date' => $carbonDateTime->toDateString(),
                'time' => $carbonDateTime->toTimeString()
            ]);
    }

    public function update(Request $request, surat $surat){
        $validatedData = $request->validate([
            'instansi'=> 'required',
            'pengirim'=> 'required',
            'no_surat'=> 'required',
            'pengunjung'=> 'required|numeric',
            'tujuan'=> 'required',
            'date'=> 'required',
            'time'=> 'required'
        ]);
        $validatedData['waktu'] = $request->input('date') . ' ' . $request->input('time');
        $validatedData['tujuan_id'] = $request->input('tujuan');
        $validatedData['user_id'] = auth()->user()->id;
        $surat->update($validatedData);
        return redirect('/arsip')->with('status', 'Surat Berhasil Diedit!');
    }

    public function ajuindex(){
        return view('tatausaha.pengajuan', [
            'title' => 'Pengajuan',
            'arsip'=> surat::where('status_id',2)->latest()->paginate(15),
        ]);
    }
}
