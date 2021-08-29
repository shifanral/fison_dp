@extends('pelanggan.master')
@section('title')
    Produk
@endsection
@section('content')
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
@endsection