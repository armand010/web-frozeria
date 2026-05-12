@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="card-title mb-0">Tambah Barang Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="image" class="form-label">Foto barang</label>
                <div class="border border-2 rounded text-center p-4" style="border-style: dashed !important; background-color: #fcfcfc; cursor: pointer;" onclick="document.getElementById('image').click()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-image text-muted mb-3" viewBox="0 0 16 16">
                      <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                      <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                    </svg>
                    <p class="mb-1 text-muted">Klik untuk memilih foto, atau seret file ke sini</p>
                    <small class="text-muted d-block mb-3">Format: JPG, PNG — Maks. 2 MB</small>
                    <button type="button" class="btn btn-outline-secondary btn-sm bg-white" onclick="event.stopPropagation(); document.getElementById('image').click()">Pilih Foto</button>
                    <p id="file-name" class="text-success mt-2 mb-0 d-none" style="font-weight: 500; font-size: 0.9rem;"></p>
                    <input class="form-control d-none @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg" onchange="if(this.files.length > 0) { document.getElementById('file-name').textContent = 'File terpilih: ' + this.files[0].name; document.getElementById('file-name').classList.remove('d-none'); } else { document.getElementById('file-name').classList.add('d-none'); }">
                </div>
                @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama barang <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="unit" class="form-label">Satuan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" value="{{ old('unit') }}" required>
                    @error('unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="current_stock" class="form-label">Jumlah stok <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('current_stock') is-invalid @enderror" id="current_stock" name="current_stock" value="{{ old('current_stock', 0) }}" min="0" required>
                    @error('current_stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="min_stock" class="form-label">Stok minimum</label>
                    <input type="number" class="form-control @error('min_stock') is-invalid @enderror" id="min_stock" name="min_stock" value="{{ old('min_stock', 0) }}" min="0">
                    @error('min_stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="sell_price" class="form-label">Harga jual (Rp)</label>
                    <input type="number" class="form-control @error('sell_price') is-invalid @enderror" id="sell_price" name="sell_price" value="{{ old('sell_price', 0) }}" min="0">
                    @error('sell_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="buy_price" class="form-label">Harga beli (Rp)</label>
                    <input type="number" class="form-control @error('buy_price') is-invalid @enderror" id="buy_price" name="buy_price" value="{{ old('buy_price', 0) }}" min="0">
                    @error('buy_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="weight_size" class="form-label">Berat / ukuran</label>
                    <input type="text" class="form-control @error('weight_size') is-invalid @enderror" id="weight_size" name="weight_size" value="{{ old('weight_size') }}">
                    @error('weight_size') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="storage_location" class="form-label">Lokasi simpan</label>
                    <input type="text" class="form-control @error('storage_location') is-invalid @enderror" id="storage_location" name="storage_location" value="{{ old('storage_location') }}">
                    @error('storage_location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection
