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
        <a href="categories/create" class="btn btn-primary btn-sm">Tambah Kategori</a>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th> 
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug ?? '-'}}</td>
                <td>
                  <div class="d-flex">
                    <div>
                      <a href="/categories/edit/{{ $category->id }}" class="btn btn-sm btn-warning mr-2 ">Ubah</a>
                    </div>
                    <form action="/categories/{{ $category->id }}" method="POST" class="d-inline">
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