<?php

namespace App\Http\Controllers;

use App\Models\surat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index(){

        if(request('search')){
            $post = surat::latest()->whereDate('waktu',today())
                ->Where(function($query){
                    $query->where('instansi', 'like', '%'.request('search').'%')
                        ->orWhere('pengirim', 'like', '%'.request('search').'%');
                })->WhereHas('tamu', function ($query){
                    $query->where('datang', '!=', true)
                        ->orWhere('datang', null);
                });
            return view('resepsionis.kehadiran',[
                "title" => "Kehadiran Tamu",
                'tamu' => $post->get(),
            ]);
        }else{
            return view('resepsionis.kehadiran',[
                "title" => "Kehadiran Tamu",
            ]);
        }
        
    }
    public function show(surat $surat){
        $carbonDateTime = Carbon::parse($surat->waktu);
        return view('resepsionis.absen',[
            'surat'=> $surat,
            'date' => $carbonDateTime->toDateString(),
            'time' => $carbonDateTime->toTimeString()
        ]);
    }
    public function hadir(surat $surat){
        $surat->tamu->update(['datang'=>true]);

        return redirect('/tamu')->with('status', 'Berhasil mengisi kehadiran, Selamat Datang!');
    }
}
