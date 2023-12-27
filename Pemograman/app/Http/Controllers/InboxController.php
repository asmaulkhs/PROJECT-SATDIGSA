<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\tamu;
use App\Models\surat;
use App\Models\penolakan;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(){
        
        if(auth()->user()->jabatan_id === 1){
            return view('unit.inbox', [
            'title' => 'Surat Masuk',
            "inboxes"=> surat::where('status_id',2)->where('tujuan_id','1')->latest()->paginate(15),
        ]);
        }elseif(auth()->user()->jabatan_id === 2){
            return view('unit.inbox', [
                'title' => 'Surat Masuk',
                "inboxes"=> surat::where('status_id',2)->where('tujuan_id','2')->latest()->paginate(15),
            ]);
        }elseif(auth()->user()->jabatan_id === 3){
            return view('unit.inbox', [
                'title' => 'Surat Masuk',
                "inboxes"=> surat::where('status_id',2)->where('tujuan_id','3')->latest()->paginate(15),
            ]);
        }elseif(auth()->user()->jabatan_id === 4){
            return view('unit.inbox', [
                'title' => 'Surat Masuk',
                "inboxes"=> surat::where('status_id',2)->where('tujuan_id','4')->latest()->paginate(15),
            ]);
        }
        // return view('unit.inbox', [
        //     'title' => 'Surat Masuk',
        //     "inboxes"=> surat::where('status_id',2)->where('waktu', '>', $current)->latest()->paginate(15),
        // ]);
    }

    public function show(surat $surat){
        $carbonDateTime = Carbon::parse($surat->waktu);
        return view('unit.confirm',[
            'title' => 'Surat Masuk',
            'surat'=> $surat,
            'date' => $carbonDateTime->toDateString(),
            'time' => $carbonDateTime->toTimeString(),
            'penolakan' => $surat->penolakan
        ]);
    }

    public function indexyes(){
        if(auth()->user()->jabatan_id === 1){
            return view('unit.diterima', [
            'title' => 'Surat Diterima',
            'inbox'=> surat::where('status_id',3)->where('tujuan_id','1')->latest()->paginate(15),
        ]);
        }elseif(auth()->user()->jabatan_id === 2){
            return view('unit.diterima', [
                'title' => 'Surat Diterima',
                'inbox'=> surat::where('status_id',3)->where('tujuan_id','2')->latest()->paginate(15),
            ]);
        }elseif(auth()->user()->jabatan_id === 3){
            return view('unit.diterima', [
                'title' => 'Surat Diterima',
                'inbox'=> surat::where('status_id',3)->where('tujuan_id','3')->latest()->paginate(15),
            ]);
        }elseif(auth()->user()->jabatan_id === 4){
            return view('unit.diterima', [
                'title' => 'Surat Diterima',
                'inbox'=> surat::where('status_id',3)->where('tujuan_id','4')->latest()->paginate(15),
            ]);
        }
        // return view('unit.diterima',[
        //     'title' => 'Surat Diterima',
        //     'inbox'=> surat::where('status_id', 3)->latest()->paginate(15),
        // ]);
    }

    public function indexno(){
        if(auth()->user()->jabatan_id === 1){
            return view('unit.ditolak', [
            'title' => 'Surat Ditolak',
            'inbox'=> surat::where('status_id',4)->where('tujuan_id','1')->latest()->paginate(15),
        ]);
        }elseif(auth()->user()->jabatan_id === 2){
            return view('unit.ditolak', [
                'title' => 'Surat Ditolak',
                'inbox'=> surat::where('status_id',4)->where('tujuan_id','2')->latest()->paginate(15),
            ]);
        }elseif(auth()->user()->jabatan_id === 3){
            return view('unit.ditolak', [
                'title' => 'Surat Ditolak',
                'inbox'=> surat::where('status_id',4)->where('tujuan_id','3')->latest()->paginate(15),
            ]);
        }elseif(auth()->user()->jabatan_id === 4){
            return view('unit.ditolak', [
                'title' => 'Surat Ditolak',
                'inbox'=> surat::where('status_id',4)->where('tujuan_id','4')->latest()->paginate(15),
            ]);
        }
        // return view('unit.ditolak',[
        //     'title' => 'Surat Ditolak',
        //     'inbox'=> surat::where('status_id', 4)->latest()->paginate(15),
        // ]);
    }

    public function update(Request $request, surat $surat){
        if ($request->input('action') === '1') {
            $surat->status_id = '3';
            tamu::create(['surat_id' => $surat->id]);
            $surat->save();
            return redirect('/inbox')->with('status', 'Surat Berhasil Diterima!');
        } elseif ($request->input('action') === '2') {
            $surat->status_id = '4';
            $validatedData = $request->validate([
                'alasan' => 'required'
            ]);
            $validatedData['alasan'] = $request->input('alasan');
            $validatedData['surat_id'] = $surat->id;
            penolakan::create($validatedData);
            $surat->save();
            return redirect('/inbox')->with('status', 'Surat Berhasil Ditolak!');
        }
    }
}
