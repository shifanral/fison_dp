@extends('guest.master')
@section('title')
    <title>Frequently Asked Question</title>
@endsection
    <div id="accordion" class="m-3">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bagaimana cara membuat akun?
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <ol>
                        <li>Klik Daftar</li>
                        <li>Pada form Register, isikan nama, email, password dan konfirmasi password, no. hp, serta alamat. Kemudian klik Register. Pastikan email yang digunakan adalah email aktif</li>
                        <li>Klik Tombol Register</
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bagaimana cara memesan produk?
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <ol>
                        <li>Buka halaman Produk</li>
                        <li>Pilih produk yang ingin dipesan dengan cara klik tombol Beli</li>
                        <li>Isikan kolom Quantity, Catatan, Alamat Pengiriman</li>
                        <li>Upload file design</li>
                        <li>Klik tombol Beli</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apa saja tahapan dalam 1x pemesanan?
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <ol>
                        <li>Setelah melakukan proses pemesanan, status pesanan akan berubah menjadi Menunggu Konfirmasi Ongkir</li>
                        <li>Admin menentukan nominal ongkir, setelah itu status pesanan akan berubah Menjadi Menunggu Pembayaran </li>
                        <li>Pembeli diminta untuk mentransfer pembayaran ke No. Rekening sejumlah yang telah ditentukan, status pesanan akan berubah menjadi Menunggu Verifikasi Pembayaran</li>
                        <li>Setelah admin melakukan verifikasi pembayaran, status pesanan akan berubah menjadi Sedang Diproses dan status pembayaran berubah menjadi Sudah Dibayar</li>
                        <li>Jika sudah selesai diproses, status pesanan akan berubah menjadi Dalam Pengiriman</li>
                        <li>Jika pesanan sudah diterima, status pesanan akan berubah menjadi Selesai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>