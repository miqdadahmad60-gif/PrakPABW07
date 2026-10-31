@extends('layouts.app')
@section('title', 'Detail Laporan')
@section('content')
<h2>Detail Laporan Banjir</h2>
@if(session('success')) <div class="alert-success">{{ session('success') }}</div> @endif
<div class="card">
    <p><strong>Nama Pelapor:</strong> {{ $laporan->nama_pelapor }}</p>
    <p><strong>Nomor HP:</strong> {{ $laporan->no_hp }}</p>
    <p><strong>Lokasi:</strong> {{ $laporan->lokasi }}</p>
    <p><strong>Kecamatan:</strong> {{ $laporan->kecamatan }}</p>
    <p><strong>Tinggi Air:</strong> {{ $laporan->tinggi_air }} cm</p>
    <p><strong>Keterangan:</strong> {{ $laporan->keterangan ?: '-' }}</p>
    <p><strong>Status:</strong> {{ $laporan->status }}</p>
    @if($laporan->foto)
        <p><strong>Foto Bukti:</strong></p>
        <img src="{{ asset('storage/'.$laporan->foto) }}" alt="Foto bukti banjir" style="max-width:100%;width:400px;border-radius:8px;">
    @endif
</div>
<a class="btn" href="{{ route('petugas.laporan.edit', $laporan) }}">Edit Laporan</a>
<a class="btn btn-secondary" href="{{ route('petugas.laporan.index') }}">Kembali</a>
@endsection
