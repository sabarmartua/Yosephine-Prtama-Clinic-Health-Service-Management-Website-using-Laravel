<?php

namespace App\Exports;

use App\Models\Treatment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class TreatmentsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function collection()
    {
        $startDate = Carbon::createFromFormat('Y-m', $this->month)->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m', $this->month)->endOfMonth();

        return Treatment::with('obats')
            ->whereBetween('tanggal_pengobatan', [$startDate, $endDate])
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Pasien',
            'Usia',
            'Alamat',
            'No HP',
            'Keluhan',
            'Jenis Pengobatan',
            'Tanggal Pengobatan',
            'Harga Perawatan',
            'Harga Obat',
            'Obat yang Digunakan',
        ];
    }

    public function map($treatment): array
    {
        $obatDetails = $treatment->obats->map(function ($obat) {
            return $obat->nama . ' (' . $obat->pivot->jumlah_obat . ')';
        })->implode(', ');

        return [
            $treatment->nama_pasien,
            $treatment->usia,
            $treatment->alamat,
            $treatment->no_hp,
            $treatment->keluhan,
            $treatment->jenis_pengobatan,
            $treatment->tanggal_pengobatan,
            $treatment->harga_perawatan,
            $treatment->harga_obat,
            $obatDetails,
        ];
    }
}
