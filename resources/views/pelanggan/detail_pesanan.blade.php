@extends('pelanggan.master')
@section('title')
    Pesanan
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <p> {{ $order->product->nama }} </p>
                    <p> {{ date('d F Y H:i:s', strtotime($order->created_at)) }}</p>
                </div>
                <div class="col-6 text-right">
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
                    <p class="font-weight-bold">Ongkos Kirim</p>
                    <p>{{ 'Rp. ' . number_format($order->ongkos_kirim, 0, '.', '.') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <p class="font-weight-bold"> Sub Total Pesanan (Belum Termasuk Ongkir)</p>
                    <p>{{ 'Rp. ' . number_format($order->total, 0, '.', '.') }}</p>
                </div>
                <div class="form-group col-6">
                    <p class="font-weight-bold"> Grand Total Pesanan (Sudah Termasuk Ongkir)</p>
                    <p>{{ 'Rp. ' . number_format($order->total+$order->ongkos_kirim, 0, '.', '.') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <p class="font-weight-bold">Desain</p>
                    <p class="text-center"><img src="{{ asset('storage/design/' . $order->desain) }}"></p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <p class="font-weight-bold">Status Pembayaran</p>
                    @if($order->status_bayar == 0)
                        <span class="badge badge-pill badge-warning">Belum Dibayar</span>
                    @else
                        <span class="badge badge-pill badge-success">Sudah Dibayar</span>
                    @endif
                </div>
                <div class="form-group col-6">
                    @if($order->order_status == 1)
                        <p class="font-weight-bold">Bukti Bayar</p>
                        @if($order->payment_status == 0)
                            <form action="{{ route('pelanggan.update_order', $order->id) }}" method="POST" name="update_order" id="update_order" enctype="multipart/form-data">    
                                @csrf
                                @method('POST')
                                <input type="file" class="form-control" name="payment_receipt"> 
                            
                        @else
                            Tes
                        @endif
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-block btn-primary">Perbarui</button>
        </form>
        </div>
    </div>
@endsection