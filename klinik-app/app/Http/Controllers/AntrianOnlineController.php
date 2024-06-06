<?php

namespace App\Http\Controllers;

use App\Models\AntrianOnline;
use App\Models\CutiDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;



class AntrianOnlineController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            // Jika user adalah admin, ambil semua antrian
            $antrians = AntrianOnline::all();
            return view('Admin.AntrianOnline.index', compact('antrians'));
        } else {
            // Jika user bukan admin, hanya ambil antrian milik user tersebut
            $antrians = AntrianOnline::where('user_id', Auth::id())->get();
            return view('Pasien.AntrianOnline.create', compact('antrians'));
        }
    }

    public function create()
    {
        $antrians = AntrianOnline::where('user_id', Auth::id())->get();
        return view('Pasien.AntrianOnline.create', compact('antrians'));
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'keperluan' => 'required|string|max:255',
        'tanggal_antrian' => ['required', 'date', function ($attribute, $value, $fail) {
            $tanggal_antrian = Carbon::parse($value);
            if ($tanggal_antrian->isPast() && !$tanggal_antrian->isToday()) {
                $fail('Tanggal antrian tidak boleh sebelum hari ini.');
            }
        }],
        'deskripsi_singkat' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return redirect()->route('antrian_online.create')
            ->withErrors($validator)
            ->withInput();
    }

    $tanggal_antrian = $request->input('tanggal_antrian');

    // Check if the user has already made a request for the same date
    $existingAntrian = AntrianOnline::where('user_id', Auth::id())
        ->whereDate('tanggal_antrian', $tanggal_antrian)
        ->exists();

    if ($existingAntrian) {
        return redirect()->route('antrian_online.create')
            ->withErrors(['tanggal_antrian' => 'Anda sudah memiliki antrian untuk tanggal ini.'])
            ->withInput();
    }

    // Check if the antrian date falls within any doctor's leave period
    $cutiDokter = CutiDokter::where('tanggal_mulai', '<=', $tanggal_antrian)
        ->where('tanggal_berakhir', '>=', $tanggal_antrian)
        ->exists();

    if ($cutiDokter) {
        return redirect()->route('antrian_online.create')
            ->withErrors(['tanggal_antrian' => 'Dokter sedang cuti pada tanggal yang anda ajukan.'])
            ->withInput();
    }

    // Generate the next nomor antrian for the specific date
    $nomor_antrian = AntrianOnline::where('tanggal_antrian', $tanggal_antrian)->max('nomor_antrian') + 1;

    AntrianOnline::create([
        'user_id' => Auth::id(),
        'keperluan' => $request->input('keperluan'),
        'tanggal_antrian' => $tanggal_antrian,
        'nomor_antrian' => $nomor_antrian,
        'deskripsi_singkat' => $request->input('deskripsi_singkat'),
    ]);

    return redirect()->route('antrian_online.index')
        ->with('success', 'Antrian berhasil didaftarkan.');
}



    public function destroy(AntrianOnline $antrian)
    {
        if ($antrian->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            return redirect()->route('antrian_online.index')
                ->withErrors(['error' => 'Anda tidak memiliki izin untuk menghapus antrian ini.']);
        }

        $tanggal_antrian = $antrian->tanggal_antrian;

        $antrian->delete();

        // Update nomor antrian for remaining antrians of the same date
        $antrians = AntrianOnline::where('tanggal_antrian', $tanggal_antrian)->orderBy('nomor_antrian')->get();

        $nomor = 1;
        foreach ($antrians as $a) {
            $a->update(['nomor_antrian' => $nomor]);
            $nomor++;
        }

        return redirect()->route('antrian_online.index')
            ->with('success', 'Antrian berhasil dihapus dan nomor antrian telah diperbarui.');
    }

    public function print($id)
    {
        $antrian = AntrianOnline::findOrFail($id);
        return view('Pasien.AntrianOnline.print', compact('antrian'));
    }


    public function showToday()
    {
        $today = Carbon::today()->format('Y-m-d');
        $antrians = AntrianOnline::whereDate('tanggal_antrian', $today)->orderBy('nomor_antrian')->get();

        return view('Admin.Antrian.list', compact('antrians', 'today'));
    }
    public function downloadPDF($id)
    {
        $antrian = AntrianOnline::find($id);

        $pdf = PDF::loadView('Pasien.AntrianOnline.pdf', compact('antrian'));

        return $pdf->download('antrian.pdf');
    }
}
