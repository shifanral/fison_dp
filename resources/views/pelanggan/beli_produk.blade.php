@extends('pelanggan.master')
@section('title')
    Beli Produk
@endsection
@section('content')
    <form action="{{ route('pelanggan.save_order', $product->id) }}" method="POST" name="beli_produk" id="beli_produk" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card">
            <img class="img-fluid" src="{{ asset('storage/products/' . $product->gambar) }}">
            <div class="card-body">
                <div class="form-group">
                    <p class="font-weight-bold">Nama Produk</p>
                    <input class="form-control" type="text" name="name" value="{{ $product->nama }}" readonly>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <p class="font-weight-bold">Kode Produk</p>
                        <input class="form-control" type="text" name="id" value="{{ $product->id }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <p class="font-weight-bold">Bahan</p>
                        <input class="form-control" type="text" name="material_name" value="{{ $product->nama_bahan }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <p class="font-weight-bold">Ukuran Panjang</p>
                        <input class="form-control" type="text" name="length" value="{{ $product->panjang }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <p class="font-weight-bold">Ukuran Lebar</p>
                        <input class="form-control" type="text" name="width" value="{{ $product->lebar }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Harga Satuan Produk</label>
                    <input type="text" class="form-control" value="{{ $product->harga }}" name="price" readonly> 
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Quantity</label>
                    <input type="text" class="form-control" name="qty" onchange="Calculate()" onblur="stopCalculate()"> 
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Total Harga</label>
                    <input type="text" class="form-control" name="total_harga" onchange="Calculate()" onblur="stopCalculate()" readonly> 
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Catatan</label>
                    <input type="text" class="form-control" name="note"> 
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Design</label>
                    <input type="file" class="form-control" name="design"> 
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-block form-control">Beli</button>
            </div>
        </div>
    </form>
    
    <script type="text/javascript">
        function startCalculate(){
            interval = setInterval("Calculate()", 10);	
        }
        
        function Calculate(){
            var price=parseInt(document.beli_produk.price.value);
            var qty = parseInt(document.beli_produk.qty.value);
            
            document.beli_produk.total_harga.value = parseInt(qty*price);
        }
        
        function stopCalculate(){
            interval = clearInterval();	
        }
    </script>
@endsection