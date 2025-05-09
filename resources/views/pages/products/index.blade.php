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
                <td>{{ $loop->iteration }}</td>
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
                    <form action="/products/{{ $product->id }}" method="POST" class="d-inline">
                      @csrf
                      <button  type="submit" class="btn btn-sm btn-danger mb-3">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection