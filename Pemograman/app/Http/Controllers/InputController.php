<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Models\tujuan;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index(){
        $tujuans = tujuan::all();
        return view('tatausaha.input', [
            "title"=>"Tambah Surat",
            'tujuans' => $tujuans,
        ]);
    }

    public function store(Request $request){
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
        surat::create($validatedData);
        session()->flash('status', 'Input Surat Berhasil!');
        return redirect('/arsip');
    }
}
