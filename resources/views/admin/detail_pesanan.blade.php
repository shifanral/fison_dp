@extends('admin.master')
@section('title')
    Detail Pesanan
@endsection
@section('content')
<form action="{{ route('admin.update_pesanan', $order->id) }}" method="POST">
@csrf
@method('PUT')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-3">
                <p class="font-weight-bold">Kode Pesanan</p>
                <p>{{ $order->id }}</p>
            </div>
            <div class="form-group col-3">
                <p class="font-weight-bold">Nama Pemesan</p>
                <p>{{ $order->user->name }}</p>
            </div>
            <div class="form-group col-3">
                <p class="font-weight-bold">Status Pembayaran</p>
                <select name="payment_status" class="form-control">
                    @if($order->payment_status == 0)
                      <option value="0" selected>Belum Dibayar</option>
                      <option value="1">Sudah Dibayar</option>
                    @else
                        <option value="0">Belum Dibayar</option>
                        <option value="1" selected>Sudah Dibayar</option>
                    @endif
                </select>
            </div>
            <div class="form-group col-3">
                <p class="font-weight-bold">Status Pesanan</p>
                <select name="order_status" class="form-control">
                    @if ($order->order_status == 0)
                        <option value="0" selected>Menunggu Konfirmasi Ongkir</option>
                        <option value="1">Menunggu Pembayaran</option>
                        <option value="2">Menunggu Verifikasi Pembayaran</option>
                        <option value="3">Sedang Diproses</option>
                        <option value="4">Dalam Pengiriman</option>
                        <option value="5">Selesai</option>
                        <option value="6">Batal</option>
                    @elseif($order->order_status == 1)
                        <option value="0">Menunggu Konfirmasi Ongkir</option>
                        <option value="1" selected>Menunggu Pembayaran</option>
                        <option value="2">Menunggu Verifikasi Pembayaran</option>
                        <option value="3">Sedang Diproses</option>
                        <option value="4">Dalam Pengiriman</option>
                        <option value="5">Selesai</option>
                        <option value="6">Batal</option>
                    @elseif($order->order_status == 2)
                        <option value="0">Menunggu Konfirmasi Ongkir</option>
                        <option value="1">Menunggu Pembayaran</option>
                        <option value="2" selected>Menunggu Verifikasi Pembayaran</option>
                        <option value="3">Sedang Diproses</option>
                        <option value="4">Dalam Pengiriman</option>
                        <option value="5">Selesai</option>
                        <option value="6">Batal</option>
                    @elseif($order->order_status == 3)
                        <option value="0">Menunggu Konfirmasi Ongkir</option>
                        <option value="1">Menunggu Pembayaran</option>
                        <option value="2">Menunggu Verifikasi Pembayaran</option>
                        <option value="3" selected>Sedang Diproses</option>
                        <option value="4">Dalam Pengiriman</option>
                        <option value="5">Selesai</option>
                        <option value="6">Batal</option>
                    @elseif($order->order_status == 4)
                        <option value="0">Menunggu Konfirmasi Ongkir</option>
                        <option value="1">Menunggu Pembayaran</option>
                        <option value="2">Menunggu Verifikasi Pembayaran</option>
                        <option value="3">Sedang Diproses</option>
                        <option value="4" selected>Dalam Pengiriman</option>
                        <option value="5">Selesai</option>
                        <option value="6">Batal</option>
                    @elseif($order->order_status == 5)
                        <option value="0">Menunggu Konfirmasi Ongkir</option>
                        <option value="1">Menunggu Pembayaran</option>
                        <option value="2">Menunggu Verifikasi Pembayaran</option>
                        <option value="3">Sedang Diproses</option>
                        <option value="4">Dalam Pengiriman</option>
                        <option value="5" selected>Selesai</option>
                        <option value="6">Batal</option>
                    @else
                        <option value="0">Menunggu Konfirmasi Ongkir</option>
                        <option value="1">Menunggu Pembayaran</option>
                        <option value="2">Menunggu Verifikasi Pembayaran</option>
                        <option value="3">Sedang Diproses</option>
                        <option value="4">Dalam Pengiriman</option>
                        <option value="5">Selesai</option>
                        <option value="6" selected>Batal</option>
                    @endif
                </select>
                
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <p class="font-weight-bold">Nama Produk</p>
                <p>{{ $order->product->name }}</p>
            </div>
            <div class="form-group col-3">
                <p class="font-weight-bold">Ukuran Produk</p>
                <p>{{ $order->product->length . 'x' . $order->product->width }}</p>
            </div>
            <div class="form-group col-3">
                <p class="font-weight-bold">Material Produk</p>
                <p>{{ $order->product->material_name }}</p>
            </div>
            <div class="form-group col-3">
                <p class="font-weight-bold">Total Pesanan</p>
                <p>{{  'Rp. ' . number_format($order->amount, 0, 0 , '.') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <p class="font-weight-bold">Alamat Pengiriman</p>
                <p>{{ $order->shipping_address }}</p>
            </div>
            <div class="form-group col-6">
                <p class="font-weight-bold">Ongkos Kirim</p>
                <input type="text" name="shipping_fee" class="form-control" value="{{ $order->shipping_fee }}" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <p class="font-weight-bold">No. HP Pemesan</p>
                <p>{{ $order->user->phone }}</p>
            </div>
            <div class="form-group col-6">
                <p class="font-weight-bold">Bukti Bayar</p>
                 
            </div>
        </div>
        <div class="form-group">
            <p class="font-weight-bold">Desain</p>
            <p> <img src="{{ asset('storage/design/' . $order->design) }}"> </p>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary btn-block"><i class="fas fa-save    "></i>Simpan</button>
    </div>
</div>
</form> 
@endsection