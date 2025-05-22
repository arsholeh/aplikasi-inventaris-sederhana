@extends('layouts.main')

@section('header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Produk</h1>
    </div>
    <div class="col-sm-6">
      <ul class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item">Produk</li>
      </ul>
    </div>
      @if (session('succes'))
      <script>
          Swal.fire({
          title: "Berhasil!!",
          text: "{{ session('succes') }}",
          icon: "success"
        });
        </script>
      @endif
  </div>

@endsection

@section('content')
  <div class="row">
    <div class="col">
      <div class="card-header d-flex justify-content-end">
        <a href="products/create" class="btn btn-primary btn-sm">Tambah Produk</a>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Description</th>
                <th>Kode</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Kategori</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ ($products->currentPage() - 1 ) * $products->perPage() + $loop->index + 1  }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description}}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                  <div class="d-flex">
                    <div>
                      <a href="/products/edit/{{ $product->id }}" class="btn btn-sm btn-warning mr-2 ">Ubah</a>
                    </div>
                     <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $product->id }}">Hapus</button>
                  </div>
                </td>
              </tr>
              @include('pages.products.delete-confirmation')
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $products->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>
  </div>
@endsection