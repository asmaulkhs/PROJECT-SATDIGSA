<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.menu',[

        ]);
    }
    public function getUser(){
        return User::all();
    }
    public function show(){
        return view('admin.kelola',[
            'users' => $this->getUser(),
        ]);
    }
    public function deleteUser($id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('status', 'User tidak ditemukan.');
        }elseif($user->jabatan_id === 7){
            return redirect()->back()->with('status', 'Gagal! Tidak dapat menghapus akun Admin.');
        }else{
            $user->delete();

            return redirect()->back()->with('status', 'User berhasil dihapus.');
        }
    }
    public function kelola($id){
        $user = User::find($id);
        return view('admin.edit',[
            'user'=> $user,
        ]);
    }
    public function edit(Request $request, $id){
        $user = User::find($id);
        if (!$user) {
            return redirect('/kelola-akun')->with('status', 'User tidak ditemukan.');
        }else{
            $request->validate([
                'new_pass'=> 'required|string|min:8',
            ]);
            $user->update([
                'password' => bcrypt($request->new_pass),
            ]);
            return redirect('/kelola-akun')->with('status', 'Password berhasil diubah.');
        }
    }
    public function tambah(){
        return view('admin.tambah',[

        ]);
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'jabatan'=> 'required|string',
            'email'=> 'required|string|unique:users|email:dns',
            'password'=> 'required|string|min:8',
        ]);
        User::create([
            'jabatan_id' => $request->jabatan,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/kelola-akun')->with('status', 'Akun berhasil ditambahkan.');
    }
}
