@extends('guest.master')
@section('title')
    Fison Digital Printing
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid animate__animated animate__fadeIn" style="margin-top: 60px;">
        <div class="container">
            <h5 class="display-1 animate__animated animate__slideInDown">Selamat Datang</h5>
            <p class="display-2 animate__animated animate__slideInDown">Di Fison Digital Printing</p>
            <a href="{{ route('register') }}" style="border-width: medium;"class="btn btn-xl btn-primary">Daftar</a>
        </div>
    </div>
    <section id="produk">
        <div class="m-2 pt-2 row row-cols-1 row-cols-md-3">
            @foreach($products as $product)
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/products/'.$product->gambar) }}" class="card-img-top" height="200px">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $product->nama }}</h5>
                        <hr/>
                        <table class="table table-borderless">
                            <tr>
                                <td>Ukuran</td>
                                <td>{{ $product->panjang . 'x' . $product->lebar }}</td>
                            </tr>
                            <tr>
                                <td>Bahan</td>
                                <td>{{ $product->nama_bahan }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>{{ 'Rp. ' . number_format($product->harga, 0, '.', '.')  }}</td>
                            </tr>
                        </table>
                        <p class="text-right"><a class="btn btn-outline-primary form-control" href="{{ route('pelanggan.beli_produk', $product->id) }}">Beli</a></p>
                    </div>
                </div>        
            </div> 
            @endforeach   
        </div>
        <nav>
            <ul class="pagination justify-content-end ml-3 mr-3"> <span style="color: #ff0000;"></span>
                <li class="page-item">
                    {{ $products->links() }}
                </li>    
            </ul>
        </nav>
    </section>
    <section id="faq">
        <hr class="divider">
        <div class="align-items-center">
            @include('guest.faq')
        </div>    
    </section>
@endsection
<style>
    /* Jumbotron */
    .jumbotron {
        background-image: url({{ asset('image/background.jpg') }});
        background-size: cover;
        background-position: center;
        display: block;
        height: 720px;
        width: 100%;
        margin-top: 0px;
        text-align: center;
        position: relative;
    }

    .jumbotron .container {
        position: relative;
        z-index: 1;
    }

    .jumbotron .display-1 {
        color: white;
        margin-top: 170px;
        font-size: 75px;
        font-weight: 200;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
        margin-bottom: 30px;
        font-family: "Comic Sans MS", cursive, sans-serif;
    }

    .jumbotron .display-2 {
        color: white;
        margin-top: 5px;
        font-size: 32px;
        font-weight: 200;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
        margin-bottom: 5px;
        font-family: "Comic Sans MS", cursive, sans-serif;
    }
</style>