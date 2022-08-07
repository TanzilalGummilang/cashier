<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('contents.order.index', [
            'products' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $rules = ([
            'grand_total' => 'required|numeric|min:0'
        ]);

        $validateData = $request->validate($rules);

        Order::create($validateData);
        return to_route('orders.index')->with('success', "Order produk success");
    }
}
