@extends('admin.master')
@section('title')
    Daftar Pesanan
@endsection
@section('content')
    @foreach($orders as $order)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Nama Pemesan</p>
                    <p>{{ $order->user->nama }}</p>
                </div>
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Status Pembayaran</p>
                    @if($order->status_bayar == 0)
                        <span class="badge badge-pill badge-warning">Belum Dibayar</span>
                    @else
                        <span class="badge badge-pill badge-success">Sudah Dibayar</span>
                    @endif
                </div>
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Status Pesanan</p>
                    @if ($order->order_status == 0)
                        <span class="badge badge-pill badge-warning">Menunggu Konfirmasi Ongkir</span>
                    @elseif($order->order_status == 1)
                        <span class="badge badge-pill badge-warning">Menunggu Pembayaran</span>
                    @elseif($order->order_status == 2)
                        <span class="badge badge-pill badge-warning">Menunggu Verifikasi Pembayaran</span>
                    @elseif($order->order_status == 3)
                        <span class="badge badge-pill badge-warning">Sedang Diproses</span>
                    @elseif($order->order_status == 4)
                        <span class="badge badge-pill badge-warning">Dalam Pengiriman</span>
                    @elseif($order->order_status == 5)
                        <span class="badge badge-pill badge-success">Selesai</span>
                    @else
                        <span class="badge badge-pill badge-danger">Batal</span>
                    @endif
                </div>
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Quantity Produk</p>
                    <p>{{ $order->qty }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Nama Produk</p>
                    <p>{{ $order->product->nama }}</p>
                </div>
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Ukuran Produk</p>
                    <p>{{ $order->product->panjang . 'x' . $order->product->lebar }}</p>
                </div>
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Material Produk</p>
                    <p>{{ $order->product->nama_bahan }}</p>
                </div>
                <div class="form-group col-sm-3">
                    <p class="font-weight-bold">Total Pesanan</p>
                    <p>{{  'Rp. ' . number_format($order->total, 0, 0 , '.') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.detail_pesanan', $order->id) }}" class="btn btn-block btn-primary">Detail</a>
        </div>
    </div>
    @endforeach
    <nav>
        <ul class="pagination justify-content-end"> <span style="color: #ff0000;"></span>
            <li class="page-item">
                {{ $orders->links() }}
            </li>    
        </ul>
    </nav>
@endsection