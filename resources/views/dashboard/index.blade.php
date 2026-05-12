@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-black ">
            <div class="card-body">
                <h5 class="card-title">Total Barang</h5>
                <p class="card-text display-6">{{ $totalItems }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-black">
            <div class="card-body">
                <h5 class="card-title">Total Kategori</h5>
                <p class="card-text display-6">{{ $totalCategories }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-black">
            <div class="card-body">
                <h5 class="card-title">Stok Menipis</h5>
                <p class="card-text display-6">{{ $lowStockItems }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-black">
            <div class="card-body">
                <h5 class="card-title">Stok Habis</h5>
                <p class="card-text display-6">{{ $outOfStockItems }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title mb-0">Daftar Barang</h5>
            <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah Barang</a>
        </div>

        <form action="{{ route('dashboard') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama barang..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="category_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary w-100">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category ? $item->category->name : 'Tanpa Kategori' }}</td>
                            <td>{{ $item->current_stock }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>Rp {{ number_format($item->sell_price, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('items.show', $item->id) }}" class="btn btn-info btn-sm text-white"><i class="bi bi-eye"></i> Detail</a>
                                <a href="{{ route('item', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteItemModal{{ $item->id }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteItemModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteItemModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteItemModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Data <strong>{{ $item->name }}</strong> akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan. 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada data barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-3">
            {{ $items->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
