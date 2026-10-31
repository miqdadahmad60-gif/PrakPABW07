@extends('layouts.app')
@section('title', 'Tambah Laporan')
@section('content')
<h2>Tambah Laporan Banjir</h2>
<form action="{{ route('petugas.laporan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('lapor-banjir._form')
    <button type="submit">Simpan</button>
    <a class="btn btn-secondary" href="{{ route('petugas.laporan.index') }}">Batal</a>
</form>
@endsection
