@extends('pelanggan.master')
@section('title')
    Profil
@endsection
@section('content')
    <form method="post" action="{{ route('pelanggan.update_profil', Auth::user()->id) }}">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $pelanggan->nama }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name">Nama</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $pelanggan->nama }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="text" name="email" value="{{ $pelanggan->email }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="phone">No. HP</label>
                        <input id="phone" class="form-control" type="text" name="phone" value="{{ $pelanggan->no_hp }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="address">Alamat</label>
                        <input id="address" class="form-control" type="text" name="address" value="{{ $pelanggan->alamat }}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary form-control">Simpan</button>
            </div>
        </div>
    </form>
@endsection