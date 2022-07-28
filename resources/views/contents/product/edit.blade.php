@extends('layouts.main')
@section('title')
  Edit Produk
@endsection

@section('content')

<div class="mb-5">

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Produk</h1>
  </div>

  <div class="col-lg-6 mt-4">

    <div class="card">
      <div class="card-body">
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
          @csrf
          @method('put')
    
          <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input name="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" value="{{ old('name', $product->name) }}" autofocus>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
    
          <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input name="price" type="number" class="form-control form-control-sm @error('price') is-invalid @enderror" id="price" value="{{ old('price', (int)$product->price) }}">
            @error('price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
    
          <div class="mt-4">
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
          </div>
    
        </form>
      </div>
    </div>
    
  </div>

</div>

@endsection