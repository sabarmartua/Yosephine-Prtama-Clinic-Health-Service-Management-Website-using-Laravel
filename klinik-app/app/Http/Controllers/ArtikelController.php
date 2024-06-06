<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('kategoriArtikel')->get();
        return view('Admin.Artikel.index', compact('artikels'));
    }
    public function indexPasien()
    {
        $artikels = Artikel::with('kategoriArtikel')->get();
        return view('Pasien.Artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategoriArtikels = KategoriArtikel::all();
        return view('Admin.Artikel.create', compact('kategoriArtikels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori_artikel_id' => 'required|exists:kategori_artikel,id',
            'gambar' => 'nullable|image',
            'isi' => 'required',
        ]);

        $imagePath = $request->file('gambar')->store('artikel', 'public');

        Artikel::create([
            'judul' => $request->judul,
            'kategori_artikel_id' => $request->kategori_artikel_id,
            'gambar' => $imagePath,
            'isi' => $request->isi,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('artikel.index')
            ->with('success', 'Data artikel berhasil ditambahkan.');
    }

    public function show(Artikel $artikel)
    {
        return view('Admin.Artikel.detail', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        $kategoriArtikels = KategoriArtikel::all();
        return view('Admin.Artikel.edit', compact('artikel', 'kategoriArtikels'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required',
            'kategori_artikel_id' => 'required|exists:kategori_artikel,id',
            'gambar' => 'nullable|image',
            'isi' => 'required',
        ]);

        $data = $request->only(['judul', 'kategori_artikel_id', 'isi']);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')
            ->with('success', 'Data artikel berhasil dipervaharui.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function detail($id)
    {
        $artikel = Artikel::with('kategoriArtikel')->findOrFail($id);
        return view('Pasien.Artikel.show', compact('artikel'));
    }
}
