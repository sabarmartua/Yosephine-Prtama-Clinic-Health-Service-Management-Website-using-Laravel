<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    // Menampilkan daftar jadwal
    public function index()
    {
        $jadwals = Jadwal::with('pegawai', 'user')->get();
        return view('Admin.Jadwal.index', compact('jadwals'));
    }

    // Menampilkan form untuk membuat jadwal baru
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('Admin.Jadwal.create', compact('pegawais'));
    }

    // Menyimpan jadwal baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jadwal' => 'required|array',
            'jadwal.*.hari' => 'required|string',
            'jadwal.*.jam_mulai' => 'required|date_format:H:i',
            'jadwal.*.jam_selesai' => 'required|date_format:H:i|after:jadwal.*.jam_mulai',
        ]);

        Jadwal::create([
            'pegawai_id' => $request->pegawai_id,
            'user_id' => Auth::id(),
            'jadwal' => $request->jadwal,
        ]);

        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit jadwal
    public function edit(Jadwal $jadwal)
    {
        $pegawais = Pegawai::all();
        return view('Admin.Jadwal.edit', compact('jadwal', 'pegawais'));
    }

    // Memperbarui jadwal di database
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jadwal' => 'required|array',
            'jadwal.*.hari' => 'required|string',
            'jadwal.*.jam_mulai' => 'required|date_format:H:i',
            'jadwal.*.jam_selesai' => 'required|date_format:H:i|after:jadwal.*.jam_mulai',
        ]);

        $jadwal->update([
            'pegawai_id' => $request->pegawai_id,
            'jadwal' => $request->jadwal,
        ]);

        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Menghapus jadwal dari database
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function indexUser()
    {
        $jadwals = Jadwal::all();
        return view('User.AboutUs.index', compact('jadwals'));
    }
}

