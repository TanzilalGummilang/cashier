@extends('layouts.main')
@section('title')
Pilih Produk
@endsection

@section('content')

<div class="mb-5">

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pilih Produk</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif  

  <div class="mt-2">

    <div class="col-sm-4">

      <div class="mt-2">
        <label for="name" class="form-label">Nama</label>
        <select class="form-select form-select-sm" id="name" name="name" required>
          <option value="">-- pilih --</option>

          @foreach ($products as $product)
            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
          @endforeach

        </select>
      </div>

      <div class="mt-2">
        <label for="price" class="form-label">Harga</label>
        <input class="form-control form-control-sm" type="number" id="price" name="price" value="" placeholder="0" readonly>
      </div>

      <div class="mt-2">
        <label for="qty" class="form-label">Qty</label>
        <input type="number" class="form-control form-control-sm" id="qty" name="qty" placeholder="0">
      </div>

      <div class="mt-2">
        <label for="sub-total" class="form-label">Sub Total</label>
        <input type="number" class="form-control form-control-sm" id="sub-total" name="sub-total" placeholder="0" readonly>
      </div>

      <div class="mt-2">
        <button onclick="orderAdd(this)" class="btn btn-primary btn-sm">
          <span data-feather="plus" class="align-text-bottom"></span> Add to cart
        </button>
      </div>

    </div>

    <form action="{{ route('orders.store') }}" method="POST">
      @csrf

      <div class="mt-4 mb-3 row">
        <div class="col-sm-4">
          <label for="grand-total" class="form-label fw-bold">Grand Total</label>
          <input type="number" class="form-control form-control-sm" id="grand-total" name="grand_total" value="0" readonly>
        </div>

        <div class="col-auto mt-auto">
          <button class="btn btn-success btn-sm">
            <span data-feather="shopping-cart" class="align-text-bottom"></span> Submit
          </button>
        </div>
      </div>
    </form>
    
    <div class="table-responsive mt-4">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Opsi</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Qty</th>
            <th scope="col">Sub Total</th>
          </tr>
        </thead>
        <tbody id="tbody"></tbody>
      </table>
    </div>

  </div>

</div>

<script src="js/order.js"></script>

@endsection