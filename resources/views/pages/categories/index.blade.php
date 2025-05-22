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
      @if (session('succes'))
      <script>
          Swal.fire({
          title: "Berhasil!!",
          text: "{{ session('succes') }}",
          icon: "success"
        });
        </script>
      @endif
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
                <td>{{ ($categories->currentPage() - 1 ) * $categories->perPage() + $loop->index + 1  }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug ?? '-'}}</td>
                <td>
                  <div class="d-flex">
                    <div>
                      <a href="/categories/edit/{{ $category->id }}" class="btn btn-sm btn-warning mr-2 ">Ubah</a>
                    </div>
                    {{-- <form action="/categories/{{ $category->id }}" method="POST" class="d-inline">
                      @csrf
                      <button  type="submit" class="btn btn-sm btn-danger mb-3">Delete</button>
                    </form> --}}
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $category->id }}">Hapus</button>
                  </div>
                </td>
              </tr>
              @include('pages.categories.delete-confirmation')
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $categories->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>
  </div>
@endsection