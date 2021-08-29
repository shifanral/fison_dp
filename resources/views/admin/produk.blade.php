@extends('admin.master')
@section('title')
    Data Produk
@endsection
@section('content')
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#input_product"><i class="fa fa-plus-circle" aria-hidden="true"></i>
    Tambah Produk Baru 
</button>
    <table class="table table-light" id="tabel">
        <thead class="thead-light">
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Ukuran</th>
                <th>Bahan</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->nama }}</td>
                <td>{{ 'Rp. ' . number_format($product->harga, 0, '.', '.') }}</td>
                <td>{{ $product->panjang . ' x ' . $product->lebar }}</td>
                <td>{{ $product->nama_bahan  }}</td>
                <td>
                    <img src="{{ asset('storage/products/' . $product->gambar) }}" width="100px" length="100px" >
                </td>
                <td>
                    @if($product->status == 1)
                        <span class="badge badge-success">Aktif</span>
                    @else
                        <span class="badge badge-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.edit_produk', $product->id) }}" class="btn btn-sm btn-primary mb-1"><i class="fas fa-pen"></i> Edit</a>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal{{$product->id}}"><i class="fas fa-trash-alt"></i> Delete</button>
                    <!-- Moodal Delete -->
    <form action="{{ route('admin.delete_produk', $product->id ?? '') }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal fade" id="delete-modal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="my-modal-title">Konfirmasi</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-weight-bold text-danger"> <i class="fas fa-exclamation-triangle"></i> Data yang sudah dihapus tidak dapat dipulihkan <i class="fas fa-exclamation-triangle"></i> </p> 
                        <p>Apakah anda yakin ingin menghapus data?</p> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-window-close" aria-hidden="true"></i> Batal</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--/ Modal Delete-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Insert -->            
        <!-- Modal -->
        <div class="modal fade" id="input_product" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                        <form action="{{ route('admin.store_product') }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Produk">
                            </div>
                            <div class="form-group">
                                <label for="picture">Gambar Produk</label>
                                <input type="file" name="picture" id="picture">
                            </div>
                            <div class="form-group mb-0">
                                <label for="price">Harga</label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" name="price" placeholder="Masukkan Harga" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="length">Ukuran Panjang</label>
                                    <input type="text" class="form-control" name="length" placeholder="Masukkan Ukuran Panjang" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="length">Ukuran Lebar</label>
                                    <input type="text" class="form-control" name="width" placeholder="Masukkan Ukuran Lebar" onkeypress="return hanyaAngka (event)" onchange="Calculate()" onblur="stopCalculate()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="material_name">Bahan</label>
                                <input type="text" class="form-control" name="material_name" placeholder="Masukkan Bahan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    <!--/ Modal Insert -->
@endsection