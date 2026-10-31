@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')
    <h2>Konfirmasi Laporan Banjir</h2>

    {{-- Menggunakan komponen Blade x-alert --}}
    <x-alert type="success" message="Laporan banjir Anda berhasil dikirim!" />

    <div class="card">
        <p><strong>Nama Pelapor:</strong> {{ $laporan['nama'] }}</p>
        <p><strong>Kecamatan:</strong> {{ $laporan['kecamatan'] }}</p>
        <p><strong>Desa:</strong> {{ $laporan['desa'] }}</p>
        <p><strong>Tinggi Genangan:</strong> {{ $laporan['tinggi_genangan'] }} cm</p>
        <p>
            <strong>Status:</strong>
            @if($laporan['tinggi_genangan'] < 30)
                <span class="badge bg-waspada">Waspada</span>
            @elseif($laporan['tinggi_genangan'] <= 70)
                <span class="badge bg-siaga">Siaga</span>
            @else
                <span class="badge bg-awas">Awas</span>
            @endif
        </p>
    </div>

    <a href="{{ route('lapor.index') }}" class="btn">Kembali ke Daftar Laporan</a>
    <a href="{{ route('lapor.form') }}" style="background-color: #6c757d;" class="btn">Buat Laporan Baru</a>
@endsection