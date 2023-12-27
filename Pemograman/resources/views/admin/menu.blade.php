@extends('admin.main')

@section('container')
    {{-- <div class="row justify-content-center align-item-center my-3">
        <div class="col-auto">
            <a href="#" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#logoutmodal"
            style="--bs-btn-padding-y: 1rem; --bs-btn-padding-x: 1.5rem; --bs-btn-font-size: 2rem;">Tambah Akun</a>
        </div>
    </div>
    <div class="row justify-content-center align-item-center my-3">
        <div class="col-auto">
            <a href="#" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#logoutmodal"
            style="--bs-btn-padding-y: 1rem; --bs-btn-padding-x: 1.5rem; --bs-btn-font-size: 2rem;">Kelola Akun</a>
        </div>
    </div>
    <div class="row justify-content-center align-item-center my-3">
        <div class="col-auto">
            <a href="#" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#logoutmodal"
            style="--bs-btn-padding-y: 1rem; --bs-btn-padding-x: 1.5rem; --bs-btn-font-size: 2rem;">LogOut</a>
        </div>
    </div> --}}
    <div class="row justify-content-center my-3">
        <div class="col-6">
            <div class="list-group text-center">
                <li class="list-group-item fw-semibold list-group-item-primary">Akun : {{ auth()->user()->nama }}</li>
                <a href="/kelola-akun" class="list-group-item list-group-item-action">Kelola Akun</a>
                <a href="/tambah-akun" class="list-group-item list-group-item-action">Tambah Akun</a>
                <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#logoutmodal">Keluar</a>
            </div>
        </div>
    </div>
@endsection