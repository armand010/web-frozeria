@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Detail Barang: {{ $item->name }}</h5>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4 text-center">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-fluid rounded shadow-sm">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded shadow-sm" style="height: 250px;">
                                <span class="text-muted"><i class="bi bi-image" style="font-size: 3rem;"></i><br>Tidak ada foto</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 30%">Nama Barang</th>
                                    <td>{{ $item->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $item->category ? $item->category->name : 'Tanpa Kategori' }}</td>
                                </tr>
                                <tr>
                                    <th>Stok Saat Ini</th>
                                    <td>
                                        {{ $item->current_stock }} {{ $item->unit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Stok Minimum</th>
                                    <td>{{ $item->min_stock }} {{ $item->unit }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Beli</th>
                                    <td>Rp {{ number_format($item->buy_price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Harga Jual</th>
                                    <td>Rp {{ number_format($item->sell_price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Berat / Ukuran</th>
                                    <td>{{ $item->weight_size ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi Penyimpanan</th>
                                    <td>{{ $item->storage_location ?: '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi Tambahan</th>
                                    <td>{{ $item->description ?: '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="mt-3">
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit Barang</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModal">
                                <i class="bi bi-trash"></i> Hapus Barang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteItemModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus barang <strong>{{ $item->name }}</strong>?
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
@endsection
