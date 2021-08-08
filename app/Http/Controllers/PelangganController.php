<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\User;
Use Auth;


class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index');
    }

    public function edit_kata_sandi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('pelanggan.edit_kata_sandi');
    } 
    
    public function update_kata_sandi(Request $request, $id_user)
    {
    $user = User::where('id', $id_user)->first();
    if(!Hash::check($request->password, $user->password)){
        return redirect(route('pelanggan.edit_kata_sandi'))->with('alert', 'Password lama salah');
    }
    if($request->password_baru != $request->konfir_password){
        return redirect(route('pelanggan.edit_kata_sandi'))->with('alert', 'Password baru dan konfirmasi tidak sama');
    }
    $ubah = User::where('id', $id_user)->update([
        'password' => Hash::make($request->password_baru)
    ]);
     return redirect(route('pelanggan.edit_kata_sandi'))->with('status', 'Password berhasil diubah');
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

    public function detail_order($id)
    {
        $order = Order::where('id', $id)->first();
        return view('pelanggan.detail_pesanan', compact('order'));
    }

    public function update_order(Request $request, $id)
    {
        if($request->hasFile('payment_receipt')){
            //menyimpan sementara ke dalam variabel file
            $file = $request->file('payment_receipt');
            //ubah nama file
            $filename = Auth::user()->id . '/' . date('d/m/Y') . $request->id . '.' . $file->getClientOriginalExtension();
            //simpan file
            $file->storeAs('public/payment_receipt', $filename);
            $order = Order::where('id', $id)->update([
                'payment_receipt' => $filename,
                'order_status' => 2,
                'payment_status' => 1
            ]);
        }
        return redirect(route('pelanggan.pesanan'))->with('status', 'Data berhasil diubah');
    }
    public function edit_profil($id)
    {
        $pelanggan = User::where('id', Auth::user()->id)->first();
        return view('pelanggan.profile', compact('pelanggan'));
    }

    public function update_profil(Request $request, $id)
    {
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect(route('pelanggan.edit_profil', $id))->with('status', 'Data berhasil diubah');
    }
}
