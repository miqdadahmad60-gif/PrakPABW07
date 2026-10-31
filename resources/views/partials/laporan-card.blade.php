<div class="card">
    <h3>{{ $laporan['nama'] }}</h3>
    <p><strong>Lokasi:</strong> Desa {{ $laporan['desa'] }}, Kecamatan {{ $laporan['kecamatan'] }}</p>
    <p><strong>Tinggi Genangan:</strong> {{ $laporan['tinggi_genangan'] }} cm</p>

    <p>
        <strong>Status Genangan:</strong>
        @if($laporan['tinggi_genangan'] < 30)
            <span class="badge bg-waspada">Waspada</span>
        @elseif($laporan['tinggi_genangan'] <= 70)
            <span class="badge bg-siaga">Siaga</span>
        @else
            <span class="badge bg-awas">Awas</span>
        @endif
    </p>
</div>