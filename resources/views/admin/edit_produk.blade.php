@extends('admin.master')
@section('title')
    Edit Produk
@endsection
@section('content')
    <form action="{{ route('admin.update_produk', $product->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Edit Produk</h5>
                <hr>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
                <div class="form-group mb-0">
                    <label for="price">Harga</label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="length">Ukuran Panjang</label>
                        <input type="text" class="form-control" name="length" value="{{ $product->length }}" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="length">Ukuran Lebar</label>
                        <input type="text" class="form-control" name="width" value="{{ $product->width }}" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Bahan</label>
                    <input type="text" name="material_name" value="{{ $product->material_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Status Produk</label>
                    <select name="status" class="form-control">
                        @if($product->status == 1)
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        @else
                            <option value="1">Aktif</option>
                            <option value="0" selected>Tidak Aktif</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="picture">Gambar</label>
                    <p class="text-center"><img src="{{ asset('storage/products/' . $product->picture) }}" alt=""></p>
                    <p class="font-weight-bold text-center"> Jika ingin mengubah gambar, silahkan upload file. Abaikan jika tidak ingin mengubah gambar </p>
                    <input type="file" name="picture">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary form-control"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </form>
@endsection