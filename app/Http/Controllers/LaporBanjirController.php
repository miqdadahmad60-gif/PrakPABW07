<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporBanjirController extends Controller
{
    // Halaman publik untuk warga mengirim laporan.
    public function form()
    {
        return view('lapor-banjir.form');
    }

    // Simpan laporan dari warga.
    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'lokasi' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'tinggi_air' => ['required', 'integer', 'min:0'],
            'keterangan' => ['nullable', 'string'],
            'foto' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
            'foto.required' => 'Foto bukti wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto hanya boleh berformat JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $validated['foto'] = $request->file('foto')->store('foto-banjir', 'public');
        $validated['status'] = 'Menunggu';

        Laporan::create($validated);

        return redirect()->route('lapor.form')
            ->with('success', 'Laporan banjir berhasil dikirim. Terima kasih atas informasinya.');
    }

    // Daftar laporan untuk petugas.
    public function index()
    {
        $laporans = Laporan::latest()->paginate(6);

        return view('lapor-banjir.index', compact('laporans'));
    }

    public function create()
    {
        return view('lapor-banjir.create');
    }

    // Petugas juga dapat menambahkan laporan melalui dashboard.
    public function store(Request $request)
    {
        $validated = $this->validateLaporan($request);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-banjir', 'public');
        }
        Laporan::create($validated);

        return redirect()->route('petugas.laporan.index')
            ->with('success', 'Data laporan berhasil ditambahkan.');
    }

    public function show(Laporan $laporan)
    {
        return view('lapor-banjir.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('lapor-banjir.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $validated = $this->validateLaporan($request);

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto-banjir', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('petugas.laporan.show', $laporan)
            ->with('success', 'Data laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return redirect()->route('petugas.laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }

    private function validateLaporan(Request $request): array
    {
        return $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'lokasi' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'tinggi_air' => ['required', 'integer', 'min:0'],
            'keterangan' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status' => ['required', 'in:Menunggu,Diproses,Selesai'],
        ]);
    }
}
