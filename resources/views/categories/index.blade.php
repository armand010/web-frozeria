@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0">Manajemen Kategori</h5>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah Kategori</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ Str::limit($category->description, 50) }}</td>
                            <td><span class="badge bg-info text-dark">{{ $category->items_count }} Barang</span></td>
                            <td>{{ $category->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $category->id }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteCategoryModalLabel{{ $category->id }}">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if($category->items_count > 0)
                                                    <div class="alert alert-warning">
                                                        Kategori <strong>{{ $category->name }}</strong> tidak dapat dihapus karena masih digunakan oleh <strong>{{ $category->items_count }} barang</strong>.
                                                    </div>
                                                @else
                                                    Data <strong>{{ $category->name }}</strong> akan dihapus secara permanen dari sistem. Tindakan ini tidak dapat dibatalkan.
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $category->items_count > 0 ? 'Tutup' : 'Batal' }}</button>
                                                @if($category->items_count == 0)
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-3">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
