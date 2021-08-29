@extends('pelanggan.master')
@section('title')
    Pesanan
@endsection
@section('content')
    @foreach($orders as $order)
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <p> {{ $order->product->nama }} </p>
                    <p> {{ date('d F Y H:i:s', strtotime($order->created_at)) }}</p>
                </div>
                <div class="col-6 text-right">
                    <p>
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
                    </p>
                    <p class="font-weight-bold text-danger">
                        @if($order->order_status == 1)
                            Harap melakukan pembayaran ke Rekening BCA 7635009608 a.n Shifa Nur Attika Lestari
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-4">
                    <p class="font-weight-bold">Harga Satuan</p>
                    <p>{{ 'Rp. ' . number_format($order->product->harga, 0, '.', '.') }}</p>
                </div>
                <div class="form-group col-4">
                    <p class="font-weight-bold">Quantity</p>
                    <p>{{ $order->qty }}</p>
                </div>
                <div class="form-group col-4">
                    <p class="font-weight-bold">Total Pesanan</p>
                    <p>{{ 'Rp. ' . number_format($order->total+$order->ongkos_kirim, 0, '.', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('pelanggan.detail_order', $order->id) }}" class="btn btn-block btn-primary">Detail</a>
        </div>
    </div>
    @endforeach
    <nav>
        <ul class="pagination justify-content-end ml-3 mr-3"> <span style="color: #ff0000;"></span>
            <li class="page-item">
                {{ $orders->links() }}
            </li>    
        </ul>
    </nav>
@endsection