@extends('layouts.main')

@section('header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Tambah Produk</h1>
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
      {{-- @if ($errors->any())
        @dd($errors->all())
      @endif --}}
      <form action="/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="name" class="form-label">Nama Produk</label>
              <input type="text" name="name" id="name"  value="{{ $category->name }}"class="form-control @error('name')
                is-invalid
              @enderror">
              @error('name')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-end">
              <a href="/categories"class="btn btn-sm btn-outline-secondary mr-2">Batal</a>
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection