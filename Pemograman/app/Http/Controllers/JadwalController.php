<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surat;
use App\Models\tamu;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(){
        $current = Carbon::now('Asia/Jakarta');
        $today = Carbon::today('Asia/Jakarta');
        $tomorrow = Carbon::tomorrow('Asia/Jakarta');
        $mingguIni = Carbon::now('Asia/Jakarta')->startOfWeek();
        $akhirMingguIni = Carbon::now('Asia/Jakarta')->endOfWeek();
        if (auth()->user()->jabatan_id === 1) {
            return view('jadwal', [
                'title' => 'Jadwal',
                'today'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '1')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereDate('waktu',$today)->orderBy('waktu','asc')->get(),
                'week'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '1')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereBetween('waktu',[$mingguIni, $akhirMingguIni])->where('waktu', '>=', $tomorrow)->orderBy('waktu','asc')->get(),
                'month'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '1')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereYear('waktu', $current->year)->whereMonth('waktu', $current->month)->orderBy('waktu','asc')->get(),
            ])->with('layout', 'unit.main');

        }elseif (auth()->user()->jabatan_id === 2) {
            return view('jadwal', [
                'title' => 'Jadwal',
                'today'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '2')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereDate('waktu',$today)->orderBy('waktu','asc')->get(),
                'week'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '2')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereBetween('waktu',[$mingguIni, $akhirMingguIni])->where('waktu', '>=', $tomorrow)->orderBy('waktu','asc')->get(),
                'month'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '2')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereYear('waktu', $current->year)->whereMonth('waktu', $current->month)->orderBy('waktu','asc')->get(),
            ])->with('layout', 'unit.main');

        }elseif (auth()->user()->jabatan_id === 3) {
            return view('jadwal', [
                'title' => 'Jadwal',
                'today'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereDate('waktu',$today)->orderBy('waktu','asc')->get(),
                'week'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereBetween('waktu',[$mingguIni, $akhirMingguIni])->where('waktu', '>=', $tomorrow)->orderBy('waktu','asc')->get(),
                'month'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereYear('waktu', $current->year)->whereMonth('waktu', $current->month)->orderBy('waktu','asc')->get(),
            ])->with('layout', 'unit.main');

        }elseif (auth()->user()->jabatan_id === 4) {
            return view('jadwal', [
                'title' => 'Jadwal',
                'today'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '4')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereDate('waktu',$today)->orderBy('waktu','asc')->get(),
                'week'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '4')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereBetween('waktu',[$mingguIni, $akhirMingguIni])->where('waktu', '>=', $tomorrow)->orderBy('waktu','asc')->get(),
                'month'=> surat::with(['status'])->where('status_id','3')->where('tujuan_id', '4')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereYear('waktu', $current->year)->whereMonth('waktu', $current->month)->orderBy('waktu','asc')->get(),
            ])->with('layout', 'unit.main');

        } elseif(auth()->user()->jabatan_id === 5){
            return view('jadwal', [
                'title' => 'Jadwal',
                'today'=> surat::with(['status'])->where('status_id','3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereDate('waktu',$today)->orderBy('waktu','asc')->get(),
                'week'=> surat::with(['status'])->where('status_id','3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereBetween('waktu',[$mingguIni, $akhirMingguIni])->where('waktu', '>=', $tomorrow)->orderBy('waktu','asc')->get(),
                'month'=> surat::with(['status'])->where('status_id','3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereYear('waktu', $current->year)->whereMonth('waktu', $current->month)->orderBy('waktu','asc')->get(),
            ])->with('layout', 'tatausaha.main');
        } elseif(auth()->user()->jabatan_id === 6) {
            return view('jadwal', [
                'title' => 'Jadwal',
                'today'=> surat::with(['status'])->where('status_id','3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereDate('waktu',$today)->orderBy('waktu','asc')->get(),
                'week'=> surat::with(['status'])->where('status_id','3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereBetween('waktu',[$mingguIni, $akhirMingguIni])->where('waktu', '>=', $tomorrow)->orderBy('waktu','asc')->get(),
                'month'=> surat::with(['status'])->where('status_id','3')->whereHas('tamu', function ($query) {
                    $query->where('datang', null);})->whereYear('waktu', $current->year)->whereMonth('waktu', $current->month)->orderBy('waktu','asc')->get(),
            ])->with('layout', 'resepsionis.main');

        }
        // return view('jadwal', [
        //     // "jadwal"=> surat::with(['status','tamu'])->where('status_id','3')->where('waktu', '>=', $currentDate)->orderBy('waktu','asc')->get()
        //     // "jadwal"=> surat::with(['status'])->where('status_id','3')->whereHas('tamu', function ($query) {
        //     //     $query->where('datang', false);})->where('waktu', '>=', $currentDate)->orderBy('waktu','asc')->get()
        // ]);
    }

}
