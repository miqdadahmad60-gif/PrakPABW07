@if($errors->any())
<div class="alert-error"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
<label>Nama Pelapor</label>
<input type="text" name="nama_pelapor" value="{{ old('nama_pelapor', $laporan->nama_pelapor ?? '') }}" required>
<label>Nomor HP</label>
<input type="text" name="no_hp" value="{{ old('no_hp', $laporan->no_hp ?? '') }}" required>
<label>Lokasi</label>
<input type="text" name="lokasi" value="{{ old('lokasi', $laporan->lokasi ?? '') }}" required>
<label>Kecamatan</label>
<input type="text" name="kecamatan" value="{{ old('kecamatan', $laporan->kecamatan ?? '') }}" required>
<label>Tinggi Air (cm)</label>
<input type="number" name="tinggi_air" min="0" value="{{ old('tinggi_air', $laporan->tinggi_air ?? '') }}" required>
<label>Keterangan</label>
<textarea name="keterangan" rows="4">{{ old('keterangan', $laporan->keterangan ?? '') }}</textarea>
<label>Foto Bukti (JPG/PNG, maksimal 2 MB)</label>
<input type="file" name="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
@if(isset($laporan) && $laporan->foto)
    <p>Foto saat ini:</p><img src="{{ asset('storage/'.$laporan->foto) }}" style="width:150px;border-radius:6px;" alt="Foto laporan">
@endif
<label>Status Penanganan</label>
<select name="status" required>
    @foreach(['Menunggu', 'Diproses', 'Selesai'] as $status)
        <option value="{{ $status }}" @selected(old('status', $laporan->status ?? 'Menunggu') === $status)>{{ $status }}</option>
    @endforeach
</select>
