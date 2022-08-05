<?php

namespace App\Http\Controllers;

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
}
