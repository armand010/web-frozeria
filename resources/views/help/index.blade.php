@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h5 class="mb-3 fw-bold" style="color: #444;">Panduan Penggunaan Sistem</h5>
        
        <div class="card mb-3 rounded-0 shadow-sm" style="border: 1px solid #ddd;">
            <div class="card-body">
                <h6 class="fw-bold mb-3 text-dark">Cara menambah barang baru</h6>
                <div class="d-flex mb-2 align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">1</span>
                    <span style="color: #555;">Buka halaman <strong>Dashboard</strong>, klik tombol <strong>+ Tambah Barang</strong> di kanan atas.</span>
                </div>
                <div class="d-flex mb-2 align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">2</span>
                    <span style="color: #555;">Unggah foto barang (opsional), lalu isi formulir: nama, kategori, satuan, jumlah stok, harga, dan lainnya.</span>
                </div>
                <div class="d-flex align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">3</span>
                    <span style="color: #555;">Klik <strong>Simpan Barang</strong>. Barang akan muncul di daftar dashboard.</span>
                </div>
            </div>
        </div>

        <div class="card mb-3 rounded-0 shadow-sm" style="border: 1px solid #ddd;">
            <div class="card-body">
                <h6 class="fw-bold mb-3 text-dark">Cara update stok barang masuk</h6>
                <div class="d-flex mb-2 align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">1</span>
                    <span style="color: #555;">Temukan barang di dashboard menggunakan kolom pencarian atau filter kategori.</span>
                </div>
                <div class="d-flex mb-2 align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">2</span>
                    <span style="color: #555;">Klik tombol <strong>Edit</strong> pada baris barang tersebut.</span>
                </div>
                <div class="d-flex align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">3</span>
                    <span style="color: #555;">Ubah nilai <strong>Jumlah stok</strong> sesuai kondisi saat ini, lalu klik <strong>Simpan Barang</strong>.</span>
                </div>
            </div>
        </div>

        <div class="card mb-3 rounded-0 shadow-sm" style="border: 1px solid #ddd;">
            <div class="card-body">
                <h6 class="fw-bold mb-3 text-dark">Cara mengelola kategori</h6>
                <div class="d-flex mb-2 align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">1</span>
                    <span style="color: #555;">Buka halaman <strong>Kategori</strong> dari navigasi atas.</span>
                </div>
                <div class="d-flex mb-2 align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">2</span>
                    <span style="color: #555;">Tambah, edit, atau hapus kategori sesuai kebutuhan toko.</span>
                </div>
                <div class="d-flex align-items-start">
                    <span class="border px-2 me-3 text-center text-dark" style="border-color: #bbb !important; min-width: 28px; height: 28px; line-height: 26px;">3</span>
                    <span style="color: #555;">Menghapus kategori tidak akan menghapus barang — barang akan menjadi tidak berkategori.</span>
                </div>
            </div>
        </div>

        <div class="card mb-5 rounded-0 shadow-sm" style="border: 1px solid #ddd;">
            <div class="card-body py-3 d-flex align-items-center">
                <i class="bi bi-clock text-secondary fs-5 me-3"></i>
                <span style="color: #555;">Satuan barang diisi bebas sesuai kebutuhan — misalnya: <strong>pcs, pack, box, kg, liter</strong>, dan lain-lain.</span>
            </div>
        </div>
    </div>
</div>
@endsection
