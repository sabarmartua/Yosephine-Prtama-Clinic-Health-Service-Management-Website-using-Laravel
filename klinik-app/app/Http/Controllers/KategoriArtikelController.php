<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategoriArtikels = KategoriArtikel::all();
        return view('Admin.KategoriArtikel.index', compact('kategoriArtikels'));
    }

    public function create()
    {
        return view('Admin.KategoriArtikel.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori_artikel,nama',
        ]);

        // Add user_id to the request data
        $data = $request->all();
        $data['user_id'] = Auth::id();

        KategoriArtikel::create($data);

        return redirect()->route('kategori_artikel.index')
            ->with('success', 'Kategori artikel berhasil ditambahkan.');
    }

    public function edit(KategoriArtikel $kategoriArtikel)
    {
        return view('Admin.KategoriArtikel.edit', compact('kategoriArtikel'));
    }

    public function update(Request $request, KategoriArtikel $kategoriArtikel)
    {
        $request->validate([
            'nama' => 'required|unique:kategori_artikel,nama,' . $kategoriArtikel->id,
        ]);

        $kategoriArtikel->update($request->all());

        return redirect()->route('kategori_artikel.index')
            ->with('success', 'Kategori artikel berhasil diperbarui.');
    }

    public function destroy(KategoriArtikel $kategoriArtikel)
    {
        $kategoriArtikel->delete();

        return redirect()->route('kategori_artikel.index')
            ->with('success', 'Kategori artikel berhasil dihapus.');
    }
}
