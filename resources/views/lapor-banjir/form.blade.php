@extends('layouts.app')

@section('title', 'Form Lapor Banjir')

@section('content')
<h2>Formulir Pelaporan Banjir</h2>
<p>Isi informasi kejadian banjir dan sertakan foto sebagai bukti.</p>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif
@if($errors->any())
    <div class="alert-error"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif

<form action="{{ route('lapor.kirim') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama Pelapor</label>
    <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" required>

    <label>Nomor HP</label>
    <input type="text" name="no_hp" value="{{ old('no_hp') }}" required>

    <label>Lokasi Kejadian</label>
    <input type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Nama jalan / desa / patokan" required>

    <label>Kecamatan</label>
    <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" required>

    <label>Tinggi Air (cm)</label>
    <input type="number" name="tinggi_air" min="0" value="{{ old('tinggi_air') }}" required>

    <label>Keterangan</label>
    <textarea name="keterangan" rows="4">{{ old('keterangan') }}</textarea>

    <label>Foto Bukti (JPG/PNG, maksimal 2 MB)</label>
    <input type="file" name="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png" required>

    <button type="submit">Kirim Laporan</button>
</form>
@endsection
