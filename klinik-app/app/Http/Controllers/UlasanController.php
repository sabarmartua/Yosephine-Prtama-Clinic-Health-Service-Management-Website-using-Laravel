<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::all();
        return view('Pasien.Ulasan.index', compact('ulasans'));
    }

    public function create()
    {
        return view('Pasien.Ulasan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isiUlasan' => 'required|string|max:255'
        ]);

        // Add user_id to the request data
        $data = $request->all();
        $data['user_id'] = Auth::id();

        Ulasan::create($data);

        return redirect()->route('ulasan.index')
            ->with('success', 'Ulasan berhasil ditambahkan.');
    }

    public function destroy(Ulasan $ulasan)
    {
        // Periksa apakah pengguna yang sedang masuk adalah pemilik ulasan
        if (auth()->user()->id !== $ulasan->user_id) {
            return redirect()->route('ulasan.index')
                ->with('error', 'Anda tidak memiliki izin untuk menghapus ulasan ini.');
        }
    
        // Jika pengguna adalah pemilik ulasan, hapus ulasan tersebut
        $ulasan->delete();
    
        return redirect()->route('ulasan.index')
            ->with('success', 'Ulasan berhasil dihapus.');
    }

    public function adminIndex()
    {
        $ulasans = Ulasan::all();
        return view('Admin.Ulasan.index', compact('ulasans'));
    }

    public function adminDestroy(Ulasan $ulasan)
    {
        $ulasan->delete();

        return redirect()->route('admin.ulasan.index')
            ->with('success', 'Ulasan berhasil dihapus.');
    }

}
