<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('Admin.Pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('Admin.Pegawai..create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'nomor_telepon' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'pendidikan_terakhir' => 'required',
        ]);

        $imagePath = $request->file('gambar')->store('pegawai', 'public');

        Pegawai::create([
            'nama' => $request->nama,
            'profesi' => $request->profesi,
            'gambar' => $imagePath,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('Admin.Pegawai..edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nomor_telepon' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'pendidikan_terakhir' => 'required',
        ]);

        $data = $request->only(['nama', 'profesi', 'nomor_telepon', 'tanggal_lahir', 'alamat', 'pendidikan_terakhir']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pegawai->gambar && Storage::disk('public')->exists($pegawai->gambar)) {
                Storage::disk('public')->delete($pegawai->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('pegawai', 'public');
        }

        $pegawai->update($data);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        if ($pegawai->gambar && Storage::disk('public')->exists($pegawai->gambar)) {
            Storage::disk('public')->delete($pegawai->gambar);
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus.');
    }

    public function showPegawai()
    {
        $jadwals = Jadwal::all();
        $pegawais = Pegawai::all();
        return view('Pasien.AboutUs.index', compact('pegawais', 'jadwals'));
    }
}
