<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
                'name' => $request->name,
                'length' => $request->length,
                'width' => $request->width,
                'picture' => $filename,
                'price' => $request->price,
                'material_name' => $request->material_name,
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
                $filename = $request->name . ' ' . $request->length . 'x' . $request->width . ' ' . $request->material_name . '.' . $file->getClientOriginalExtension();
                //simpan file
                $file->storeAs('public/products', $filename);
                //input data
                $input_product = Product::where('id', $id)->update([
                    'name' => $request->name,
                    'length' => $request->length,
                    'width' => $request->width,
                    'picture' => $filename,
                    'price' => $request->price,
                    'material_name' => $request->material_name,
                    'status' => $request->status,
                ]);
            }
        }else{
            Product::where('id', $id)->update([
                'name' => $request->name,
                'length' => $request->length,
                'width' => $request->width,
                'price' => $request->price,
                'material_name' => $request->material_name,
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
            'payment_status' => $request->payment_status,
            'shipping_fee' => $request->shipping_fee,
        ]);
        return redirect(route('admin.pesanan'))->with('status', 'Data berhasil diupdate');
    }
}
