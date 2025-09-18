@extends('admin.layouts.app')

@section('content')
  <div class="cards" style="display:grid; grid-template-columns: repeat(3, 1fr); gap:20px; margin-bottom:30px;">
    <div class="card" style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
      <h2 style="margin:0; font-size:28px;">250</h2>
      <p style="margin:5px 0 0; color:#555;">Jumlah Siswa</p>
    </div>
    <div class="card" style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
      <h2 style="margin:0; font-size:28px;">40</h2>
      <p style="margin:5px 0 0; color:#555;">Jumlah Guru</p>
    </div>
    <div class="card" style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
      <h2 style="margin:0; font-size:28px;">15</h2>
      <p style="margin:5px 0 0; color:#555;">Jumlah Berita</p>
    </div>
    <div class="card" style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
      <h2 style="margin:0; font-size:28px;">10</h2>
      <p style="margin:5px 0 0; color:#555;">Jumlah Ekskul</p>
    </div>
    <div class="card" style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
      <h2 style="margin:0; font-size:28px;">120</h2>
      <p style="margin:5px 0 0; color:#555;">Jumlah Galeri</p>
    </div>
    <div class="card" style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
      <h2 style="margin:0; font-size:28px;">5</h2>
      <p style="margin:5px 0 0; color:#555;">Jumlah User</p>
    </div>
  </div>

  <div class="section" style="margin-top:30px;">
    <h3 style="margin-bottom:10px;">📰 Berita Terbaru</h3>
    <table style="width:100%; border-collapse: collapse; background:#fff; border-radius:8px; overflow:hidden;">
      <tr>
        <th style="padding:10px; background:#f0f0f0;">Judul</th>
        <th style="padding:10px; background:#f0f0f0;">Tanggal</th>
        <th style="padding:10px; background:#f0f0f0;">Penulis</th>
      </tr>
      <tr>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Peresmian Gedung Baru</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">2025-09-10</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Admin</td>
      </tr>
      <tr>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Juara 1 Lomba Sains</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">2025-08-25</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Operator</td>
      </tr>
    </table>
  </div>

  <div class="section" style="margin-top:30px;">
    <h3 style="margin-bottom:10px;">🖼️ Galeri Terbaru</h3>
    <table style="width:100%; border-collapse: collapse; background:#fff; border-radius:8px; overflow:hidden;">
      <tr>
        <th style="padding:10px; background:#f0f0f0;">Judul</th>
        <th style="padding:10px; background:#f0f0f0;">Kategori</th>
        <th style="padding:10px; background:#f0f0f0;">Tanggal</th>
      </tr>
      <tr>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Upacara HUT RI</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Foto</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">2025-08-17</td>
      </tr>
      <tr>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Video Pentas Seni</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">Video</td>
        <td style="padding:10px; border-bottom:1px solid #ddd;">2025-07-30</td>
      </tr>
    </table>
  </div>
@endsection
