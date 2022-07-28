@extends('layouts.main')
@section('title')
Produk
@endsection

@section('content')

<div class="mb-5">

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produk</h1>
  </div>

  <div class="mt-2">

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm mb-1">
      <span data-feather="plus" class="align-text-bottom"></span> Tambah Produk
    </a>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>

        @foreach($products as $product)
          <tr>

            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>@rupiah($product->price)</td>
            <td>
              <div>

                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="badge bg-warning text-decoration-none text-dark">
                  <span data-feather="edit" class="align-text-bottom"></span> Edit
                </a>

                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf

                  <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Hapus produk ini?')">
                    <span data-feather="delete" class="align-text-bottom"></span> Delete
                  </button>
                </form>
                
              </div>
            </td>

          </tr>
        @endforeach

      </tbody>
    </table>

  </div>

</div>

@endsection