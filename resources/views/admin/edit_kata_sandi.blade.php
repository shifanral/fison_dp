@extends('admin.master')
@section('content')
    @if(session('alert'))
        <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('alert') }}
        </div>
    @endif
    <form action="{{ route('admin.update_kata_sandi', Auth::user()->id) }}" method="post">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-3"><label class="font-weight-bold">Password Lama</label></div>
                <div class="col-3"><input type="password" class="form-control" name="password"></div>
            </div>
            <div class="row">
                <div class="col-3"><label class="font-weight-bold">Password Baru</label></div>
                <div class="col-3"><input type="password" class="form-control" name="password_baru"></div>
            </div>
            
            <div class="row">
                <div class="col-3"><label class="font-weight-bold">Konfirmasi Password Baru</label></div>
                <div class="col-3"><input type="password" class="form-control" name="konfir_password"></div>
            </div>
            <div class="row text-right">
                <div class="col-6 mt-2"><button class="btn btn-primary">Ubah Password</button></div>
            </div>
    </form>
@endsection