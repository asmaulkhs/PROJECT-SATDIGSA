<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\surat;
use App\Models\status;
use App\Models\jabatan;
use App\Models\tujuan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        status::create([
            'nama_status'=>'Belum Diajukan'
        ]);
        status::create([
            'nama_status'=>'Proses Pengajuan'
        ]);
        status::create([
            'nama_status'=>'Diterima'
        ]);
        status::create([
            'nama_status'=>'Ditolak'
        ]);

        tujuan::create([
            'nama_tujuan' => 'Akademik'
        ]);
        tujuan::create([
            'nama_tujuan' => 'Mahasiswa'
        ]);
        tujuan::create([
            'nama_tujuan' => 'Kerjasama'
        ]);
        tujuan::create([
            'nama_tujuan' => 'Kepegawaian'
        ]);

        User::create([
            'jabatan_id' => '1',
            'nama' => 'Unit Akademik',
            'email' => 'akademik@gmail.com',
            'password' => bcrypt('akademik12345')
        ]);
        User::create([
            'jabatan_id' => '2',
            'nama' => 'Unit Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('mahasiswa12345')
        ]);
        User::create([
            'jabatan_id' => '3',
            'nama' => 'Unit Kerjasama',
            'email' => 'kerjasama@gmail.com',
            'password' => bcrypt('kerjasama12345')
        ]);
        User::create([
            'jabatan_id' => '4',
            'nama' => 'Unit Kepegawaian',
            'email' => 'kepegawaian@gmail.com',
            'password' => bcrypt('kepegawaian12345')
        ]);
        User::create([
            'jabatan_id' => '5',
            'nama' => 'tuadmin',
            'email' => 'tuadmin@gmail.com',
            'password' => bcrypt('tu12345')
        ]);
        User::create([
            'jabatan_id' => '6',
            'nama' => 'resepadmin',
            'email' => 'resepadmin@gmail.com',
            'password' => bcrypt('resep12345')
        ]);
        User::create([
            'jabatan_id' => '7',
            'nama' => 'superadmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12345')
        ]);

        jabatan::create([
            'nama_jabatan' => 'Unit Akademik'
        ]);
        jabatan::create([
            'nama_jabatan' => 'Unit Mahasiswa'
        ]);
        jabatan::create([
            'nama_jabatan' => 'Unit Kerjasama'
        ]);
        jabatan::create([
            'nama_jabatan' => 'Unit Kepegawaian'
        ]);
        jabatan::create([
            'nama_jabatan' => 'Tatausaha'
        ]);
        jabatan::create([
            'nama_jabatan' => 'Resepsionis'
        ]);
        jabatan::create([
            'nama_jabatan' => 'Admin'
        ]);
        surat::factory(50)->create();
    }
}
