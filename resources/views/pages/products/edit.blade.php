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
      <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="name" class="form-label">Nama Produk</label>
              <input type="text" name="name" id="name"  value="{{ $product->name }}"class="form-control @error('name')
                is-invalid
              @enderror">
              @error('name')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="description" class="form-label">Description</label>
              <textarea 
              name="description" 
              id="description"  
              class="form-control @error('description')
                is-invalid
              @enderror" 
              cols="30" 
              rows="10">{{ $product->description }}</textarea>
              @error('description')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="sku" class="form-label">Kode Produk</label>
              <input type="text" name="sku" id="sku" value="{{ $product->sku }} " class="form-control @error('sku')
                is-invalid
              @enderror">
              @error('sku')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="price" class="form-label">Harga</label>
              <input type="number" name="price" id="price" value="{{ $product->price }}" class="form-control @error('price')
                is-invalid
              @enderror">
              @error('price')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="stock" class="form-label">Stock</label>
              <input type="number" name="stock" id="stock" value="{{ $product->stock }}" class="form-control @error('stock')
                is-invalid
              @enderror">
              @error('stock')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="category_id" class="form-label">Kategori</label>
              <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category )
                <option value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-end">
              <a href="/products"class="btn btn-sm btn-outline-secondary mr-2">Batal</a>
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection