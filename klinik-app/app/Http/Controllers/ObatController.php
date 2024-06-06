<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('Admin.Obat.index', compact('obats'));
    }

    public function create()
    {
        return view('Admin.Obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah_stok' => 'required|integer|min:0',
            'deskripsi' => 'required',
            'tanggal_expired' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isToday() || Carbon::parse($value)->isPast()) {
                        $fail('Tanggal expired tidak boleh hari ini atau sebelum hari ini.');
                    }
                },
            ],
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('gambar')->store('obat', 'public');

        Obat::create([
            'nama' => $request->nama,
            'jumlah_stok' => $request->jumlah_stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_expired' => $request->tanggal_expired,
            'gambar' => $imagePath,
            'harga' => $request->harga,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit(Obat $obat)
    {
        return view('Admin.Obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah_stok' => 'required|integer|min:0',
            'deskripsi' => 'required',
            'tanggal_expired' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isToday() || Carbon::parse($value)->isPast()) {
                        $fail('Tanggal expired tidak boleh hari ini atau sebelum hari ini.');
                    }
                },
            ],
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric|min:0',
        ]);

        $data = $request->only(['nama', 'jumlah_stok', 'deskripsi', 'tanggal_expired', 'harga']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($obat->gambar && Storage::disk('public')->exists($obat->gambar)) {
                Storage::disk('public')->delete($obat->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('obat', 'public');
        }

        $obat->update($data);

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy(Obat $obat)
    {
        if ($obat->gambar && Storage::disk('public')->exists($obat->gambar)) {
            Storage::disk('public')->delete($obat->gambar);
        }

        $obat->delete();

        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil dihapus.');
    }

    public function show(Obat $obat)
    {
        return view('Admin.Obat.detail', compact('obat'));
    }

    public function userIndex()
    {
        $obats = Obat::all();
        return view('Pasien.Obat.index', compact('obats'));
    }

    public function userShow(Obat $obat)
    {
        return view('Pasien.Obat.show', compact('obat'));
    }
}
