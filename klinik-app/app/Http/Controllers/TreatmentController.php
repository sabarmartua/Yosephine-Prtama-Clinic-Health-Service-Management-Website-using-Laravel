<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\Obat;
use App\Exports\TreatmentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

class TreatmentController extends Controller
{
    /**
     * Menampilkan daftar treatment.
     */
    public function index()
    {
        $treatments = Treatment::with('obats')->get();
        return view('Admin.Treatment.index', compact('treatments'));
    }

    /**
     * Menampilkan form untuk membuat treatment baru.
     */
    public function create()
    {
        $obats = Obat::all();
        $obatPrices = $obats->pluck('harga', 'id'); // Misalnya, 'harga' adalah atribut harga di model Obat
        return view('Admin.Treatment.create', compact('obats', 'obatPrices'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'usia' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'keluhan' => 'required|string',
            'jenis_pengobatan' => 'required|string|max:255',
            'tanggal_pengobatan' => 'required|date',
            'harga_perawatan' => 'required|numeric',
            'harga_obat' => 'required|numeric',
            'obat_id' => 'required|array',
            'obat_id.*' => 'exists:obats,id',
            'jumlah_obat' => 'required|array',
            'jumlah_obat.*' => 'required|integer|min:1',
        ]);

        $obatData = [];
        foreach ($validated['obat_id'] as $index => $obatId) {
            $obat = Obat::findOrFail($obatId);
            if ($validated['jumlah_obat'][$index] > $obat->jumlah_stok) {
                return redirect()->route('treatments.create')
                    ->withErrors(['jumlah_obat.' . $index => 'Stok obat tidak mencukupi untuk obat ID ' . $obatId])
                    ->withInput();
            }
            $obatData[] = [
                'obat_id' => $obatId,
                'jumlah_obat' => $validated['jumlah_obat'][$index],
            ];
        }

        $treatment = Treatment::create([
            'nama_pasien' => $validated['nama_pasien'],
            'usia' => $validated['usia'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'keluhan' => $validated['keluhan'],
            'jenis_pengobatan' => $validated['jenis_pengobatan'],
            'tanggal_pengobatan' => $validated['tanggal_pengobatan'],
            'harga_perawatan' => $validated['harga_perawatan'],
            'harga_obat' => $validated['harga_obat'],
            'obat' => json_encode($obatData),
            'user_id' => Auth::id(),
        ]);

        foreach ($obatData as $data) {
            $obat = Obat::findOrFail($data['obat_id']);
            $obat->jumlah_stok -= $data['jumlah_obat'];
            $obat->save();
            $treatment->obats()->attach($data['obat_id'], ['jumlah_obat' => $data['jumlah_obat']]);
        }

        return redirect()->route('treatments.index')->with('success', 'Treatment berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit treatment.
     */
    public function edit($id)
    {
        $treatment = Treatment::with('obats')->findOrFail($id);
        $obats = Obat::all();
        $obatPrices = Obat::pluck('harga', 'id')->toJson();

        return view('Admin.Treatment.edit', compact('treatment', 'obats', 'obatPrices'));
    }

    /**
     * Memperbarui treatment yang ada.
     */
    public function update(Request $request, $id)
    {
        // Validation
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'usia' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'keluhan' => 'required|string',
            'jenis_pengobatan' => 'required|string|max:255',
            'tanggal_pengobatan' => 'required|date',
            'obat_id' => 'required|array',
            'obat_id.*' => 'exists:obats,id',
            'jumlah_obat' => 'required|array',
            'jumlah_obat.*' => 'required|integer|min:1',
        ]);

        $treatment = Treatment::findOrFail($id);

        // Revert previous stock changes
        $previousObatData = json_decode($treatment->obat, true);
        foreach ($previousObatData as $data) {
            $obat = Obat::findOrFail($data['obat_id']);
            $obat->jumlah_stok += $data['jumlah_obat'];
            $obat->save();
        }

        // Prepare new obat data
        $obatData = [];
        foreach ($validated['obat_id'] as $index => $obatId) {
            $obat = Obat::findOrFail($obatId);
            if ($validated['jumlah_obat'][$index] > $obat->jumlah_stok) {
                return redirect()->route('treatments.edit', $id)
                    ->withErrors(['jumlah_obat.' . $index => 'Stok obat tidak mencukupi untuk obat ID ' . $obatId])
                    ->withInput();
            }
            $obatData[] = [
                'obat_id' => $obatId,
                'jumlah_obat' => $validated['jumlah_obat'][$index],
            ];
        }

        // Update treatment data
        $treatment->update([
            'nama_pasien' => $validated['nama_pasien'],
            'usia' => $validated['usia'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'keluhan' => $validated['keluhan'],
            'jenis_pengobatan' => $validated['jenis_pengobatan'],
            'tanggal_pengobatan' => $validated['tanggal_pengobatan'],
            'obat' => json_encode($obatData),
        ]);

        // Detach old obat relations
        $treatment->obats()->detach();

        // Adjust new stock and attach new obat relations
        foreach ($obatData as $data) {
            $obat = Obat::findOrFail($data['obat_id']);
            $obat->jumlah_stok -= $data['jumlah_obat'];
            $obat->save();
            $treatment->obats()->attach($data['obat_id'], ['jumlah_obat' => $data['jumlah_obat']]);
        }

        return redirect()->route('treatments.index')->with('success', 'Treatment berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);

        // Kembalikan stok obat sebelum dihapus
        $previousObatData = json_decode($treatment->obat, true);
        foreach ($previousObatData as $data) {
            $obat = Obat::findOrFail($data['obat_id']);
            $obat->jumlah_stok += $data['jumlah_obat'];
            $obat->save();
        }

        $treatment->obats()->detach();
        $treatment->delete();

        return redirect()->route('treatments.index')->with('success', 'Treatment berhasil dihapus.');
    }

    public function export(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        return Excel::download(new TreatmentsExport($request->month), 'treatments-' . $request->month . '.xlsx');
    }

    public function print($id)
    {
        $treatment = Treatment::with('obats')->findOrFail($id);
        return view('Admin.Treatment.print', compact('treatment'));
    }

    public function pdf($id)
    {
        $treatment = Treatment::with('obats')->findOrFail($id);
        $pdf = PDF::loadView('Admin.Treatment.pdf', compact('treatment'));
        return $pdf->download('treatment_' . $treatment->id . '.pdf');
    }
}
