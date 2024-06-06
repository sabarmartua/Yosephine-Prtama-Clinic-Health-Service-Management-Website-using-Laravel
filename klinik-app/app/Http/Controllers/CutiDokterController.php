<?php

namespace App\Http\Controllers;

use App\Models\CutiDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class CutiDokterController extends Controller
{
    public function index()
    {
        $cutiDokters = CutiDokter::all();
        return view('Admin.CutiDokter.index', compact('cutiDokters'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_mulai' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isPast()) {
                        $fail('Tanggal mulai tidak boleh di masa lalu.');
                    }
                }
            ],
            'tanggal_berakhir' => [
                'required',
                'date',
                'after:tanggal_mulai',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isToday()) {
                        $fail('Tanggal berakhir tidak boleh hari ini.');
                    }
                }
            ],
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('cuti_dokter.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Add user_id to the validated data
        $data = $request->all();
        $data['user_id'] = Auth::id();

        CutiDokter::create($data);

        return redirect()->route('cuti_dokter.index')
            ->with('success', 'Data cuti dokter berhasil ditambahkan.');
    }


    public function edit(CutiDokter $cutiDokter)
    {
        return view('Admin.CutiDokter.edit', compact('cutiDokter'));
    }

    public function update(Request $request, CutiDokter $cutiDokter)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('cuti_dokter.edit', $cutiDokter->id)
                ->withErrors($validator)
                ->withInput();
        }

        $cutiDokter->update($request->all());

        return redirect()->route('cuti_dokter.index')
            ->with('success', 'Data cuti dokter berhasil diperbarui.');
    }

    public function destroy(CutiDokter $cutiDokter)
    {
        $cutiDokter->delete();

        return redirect()->route('cuti_dokter.index')
            ->with('success', 'Data cuti dokter berhasil dihapus.');
    }

    public function showNextMonthLeaves()
    {
        // Get the current date
        $today = Carbon::today();

        // Calculate the date one month from now
        $nextMonth = $today->copy()->addMonth();

        // Fetch leave dates that start within the next month
        $leaves = CutiDokter::where('tanggal_mulai', '>=', $today)
            ->where('tanggal_mulai', '<=', $nextMonth)
            ->get();

        return view('Pasien.CutiDokter.index', compact('leaves'));
    }
}
