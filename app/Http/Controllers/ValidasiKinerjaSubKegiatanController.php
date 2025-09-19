<?php

namespace App\Http\Controllers;

use App\Models\KinerjaSubKegiatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidasiKinerjaSubKegiatanController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'satuan_kerja_id' => ['required', 'numeric'],
            'bulan' => ['required', 'string', Rule::in(array_map(fn (array $month) => $month[0], MONTHS))],
        ]);

        $data = KinerjaSubKegiatan::tahunKinerja()
            ->roleSatuanKerja($validated['satuan_kerja_id'])
            ->targetBulanan($validated['bulan'])
            ->select('id', 'target_bulanan', 'realisasi_bulanan', 'eviden_bulanan', 'validasi_bulanan', 'kegiatan_id', 'sub_kegiatan_id', 'sasaran', 'indikator', 'satuan')
            ->with([
                'kegiatan' => fn ($query) => $query->tahunKinerja(),
                'subKegiatan' => fn ($query) => $query->tahunKinerja(),
            ])
            ->orderBy('id')
            ->paginate(20);

        return response()->json($data);
    }

    public function validasi(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric'],
            'bulan' => ['required', 'string', Rule::in(array_map(fn (array $month) => $month[0], MONTHS))],
            'status' => ['required', 'boolean'],
            'catatan' => ['nullable', 'string'],
        ]);

        KinerjaSubKegiatan::tahunKinerja()
            ->where('id', $validated['id'])
            ->update([
                'validasi_bulanan->'.$validated['bulan'] => [
                    'status' => $validated['status'],
                    'catatan' => $validated['catatan'],
                ],
            ]);

        return response()->json([
            'success' => true,
        ]);
    }
}
