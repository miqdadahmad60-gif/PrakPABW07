@extends('layouts.app')
@section('title', 'Daftar Laporan Banjir')
@section('content')
<h2>Daftar Laporan Banjir</h2>
<p>Kelola laporan banjir yang dikirim oleh masyarakat.</p>

@if(session('success')) <div class="alert-success">{{ session('success') }}</div> @endif
<a class="btn" href="{{ route('petugas.laporan.create') }}">+ Tambah Laporan</a>

<div style="overflow-x:auto; margin-top:18px;">
<table>
    <thead><tr><th>Foto</th><th>Pelapor</th><th>Lokasi</th><th>Kecamatan</th><th>Tinggi Air</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($laporans as $laporan)
        <tr>
            <td>
                @if($laporan->foto)
                    <img src="{{ asset('storage/'.$laporan->foto) }}" alt="Foto banjir" style="width:85px;height:65px;object-fit:cover;border-radius:5px;">
                @else
                    -
                @endif
            </td>
            <td>{{ $laporan->nama_pelapor }}</td>
            <td>{{ $laporan->lokasi }}</td>
            <td>{{ $laporan->kecamatan }}</td>
            <td>{{ $laporan->tinggi_air }} cm</td>
            <td><span class="badge">{{ $laporan->status }}</span></td>
            <td class="actions">
                <a class="btn" href="{{ route('petugas.laporan.show', $laporan) }}">Detail</a>
                <a class="btn btn-warning" href="{{ route('petugas.laporan.edit', $laporan) }}">Edit</a>
                <form action="{{ route('petugas.laporan.destroy', $laporan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7">Belum ada laporan banjir.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
{{ $laporans->links() }}
@endsection
