<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $products = Product::where('status', '1')->paginate(6);
        return view('guest.index', compact('products'));
    }
}
