<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $order0 = Order::where('order_status', '0')->count();
        $order2 = Order::where('order_status', '2')->count();
        $order3 = Order::where('order_status', '3')->count();
        $order5 = Order::where('order_status', '5')->count();
        return view('admin.index', compact('order0', 'order2', 'order3', 'order5'));
    }

    public function edit_kata_sandi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.edit_kata_sandi');
    } 
    
    public function update_kata_sandi(Request $request, $id_user)
    {
    $user = User::where('id', $id_user)->first();
    if(!Hash::check($request->password, $user->password)){
        return redirect(route('admin.edit_kata_sandi'))->with('alert', 'Password lama salah');
    }
    if($request->password_baru != $request->konfir_password){
        return redirect(route('admin.edit_kata_sandi'))->with('alert', 'Password baru dan konfirmasi tidak sama');
    }
    $ubah = User::where('id', $id_user)->update([
        'password' => Hash::make($request->password_baru)
    ]);
     return redirect(route('admin.edit_kata_sandi'))->with('status', 'Password berhasil diubah');
    }

    public function pelanggan()
    {
       $customers = User::where('role', '2')->get();
        return view('admin.pelanggan', compact('customers'));
    }

    public function produk()
    {
        $products = Product::all();
        return view('admin.produk', compact('products'));
    }

    public function store_product(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|image|mimes:png,jpeg,jpg',
            'price' => 'required|integer',
            'length' => 'required',
            'width' => 'required',
        ]); 
        if($request->hasFile('picture')){
            //menyimpan sementara ke dalam variabel file
            $file = $request->file('picture');
            //ubah nama file
            $filename = $request->name . ' ' . $request->length . 'x' . $request->width . ' ' . $request->material_name . '.' . $file->getClientOriginalExtension();
            //simpan file
            $file->storeAs('public/products', $filename);
            //input data
            $input_product = Product::create([
                'nama' => $request->name,
                'panjang' => $request->length,
                'lebar' => $request->width,
                'gambar' => $filename,
                'harga' => $request->price,
                'nama_bahan' => $request->material_name,
                'status' => '1',
            ]);
            return redirect(route('admin.produk'))->with('status', 'Data berhasil diinput!');
        }    
    }

    public function edit_produk($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.edit_produk', compact('product'));
    }

    public function update_produk(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image|mimes:png,jpeg,jpg',
            'price' => 'required|integer',
            'length' => 'required',
            'width' => 'required',
        ]); 
        if(!empty($request->picture)){
            if($request->hasFile('picture')){
                //menyimpan sementara ke dalam variabel file
                $file = $request->file('picture');
                //ubah nama file
                $filename = $request->name . ' ' . $request->panjang . 'x' . $request->lebar . ' ' . $request->nama_bahan . '.' . $file->getClientOriginalExtension();
                //simpan file
                $file->storeAs('public/products', $filename);
                //input data
                $input_product = Product::where('id', $id)->update([
                    'nama' => $request->name,
                    'panjang' => $request->length,
                    'lebar' => $request->width,
                    'gambar' => $filename,
                    'harga' => $request->price,
                    'nama_bahan' => $request->material_name,
                    'status' => $request->status,
                ]);
            }
        }else{
            Product::where('id', $id)->update([
                'nama' => $request->name,
                'panjang' => $request->length,
                'lebar' => $request->width,
                'harga' => $request->price,
                'nama_bahan' => $request->material_name,
                'status' => $request->status,
            ]);
        }  
        return redirect(route('admin.produk'))->with('status', 'Data berhasil diubah!');          
    }

    public function delete_produk($id)
    {
        Product::where('id', $id)->delete();
        return redirect(route('admin.produk'))->with('status', 'Data berhasil dihapus!');          
    }

    public function pesanan()
    {
        $orders = Order::paginate(10);
        return view('admin.pesanan', compact('orders'));
    }
    public function detail_pesanan($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.detail_pesanan', compact('order'));
    }
    public function update_pesanan(Request $request, $id)
    {
        $this->validate($request, [
            'order_status' => 'required',
            'payment_status' => 'required',
            'shipping_fee' => 'required',
        ]);              
        Order::where('id', $id)->update([
            'order_status' => $request->order_status,
            'status_bayar' => $request->payment_status,
            'ongkos_kirim' => $request->shipping_fee,
        ]);
        return redirect(route('admin.pesanan'))->with('status', 'Data berhasil diupdate');
    }
}
