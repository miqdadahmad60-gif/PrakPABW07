@extends('layouts.app')
@section('title', 'Edit Laporan')
@section('content')
<h2>Edit Laporan Banjir</h2>
<form action="{{ route('petugas.laporan.update', $laporan) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('lapor-banjir._form')
    <button type="submit">Simpan Perubahan</button>
    <a class="btn btn-secondary" href="{{ route('petugas.laporan.index') }}">Batal</a>
</form>
@endsection
