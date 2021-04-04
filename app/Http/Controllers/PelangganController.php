<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
Use Auth;


class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index');
    }

    public function produk()
    {
        $products = Product::where('status', '1')->paginate(9);
        return view('pelanggan.produk', compact('products'));
    }

    public function beli_produk($id)
    {
        $product = Product::where('id', $id)->first();
        return view('pelanggan.beli_produk', compact('product'));
    }

    public function save_order(Request $request, $id)
    {
        if($request->hasFile('design')){
            //menyimpan sementara ke dalam variabel file
            $file = $request->file('design');
            //ubah nama file
            $filename = Auth::user()->id . '/' . date('d/m/Y') . $request->id . '.' . $file->getClientOriginalExtension();
            //simpan file
            $file->storeAs('public/design', $filename);
            Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'qty' => $request->qty,
                'amount' => $request->total_harga,
                'note' => $request->note,
                'shipping_address' => $request->shipping_address,
                'order_status' => '0',
                'payment_status' => '0',
                'design' => $filename,
            ]);
        }
        return redirect(route('pelanggan.produk'))->with('status', 'Pesanan berhasil diinput, silahkan cek halaman pesanan untuk melihat updatenya!');
    }
    public function pesanan()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(10);
        return view('pelanggan.pesanan', compact('orders'));
    }
}
