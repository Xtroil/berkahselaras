<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeKerja\StoreTimKerja;
use App\Http\Requests\TimKerja\SearchPegawaiRequest;
use App\Models\Ekinerja\TimKerja;
use App\Models\Ekinerja\VPegawaiData;

class TimKerjaController extends Controller
{
    public function store(StoreTimKerja $request)
    {
        $data = $request->validated();

        // $isExists = TimKerja::where('satuan_kerja_id', $data['satuan_kerja_id'])
        //     ->where('v_struktur_organisasi_id', $data['v_struktur_organisasi_id'])
        //     ->where('nama', trim($data['nama']))
        //     ->exists();

        // if ($isExists) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Nama Tim Kinerja sudah ada',
        //     ]);
        // }

        $data = TimKerja::create($data);
        $data->load('ketua:peg_nip,peg_nama');

        return response()->json([
            'success' => true,
            'message' => 'Berhasil tambah data',
            'data' => $data,
        ]);
    }

    public function searchPegawai(SearchPegawaiRequest $request)
    {
        $validated = $request->validated();
        $search = $validated['search'] ?? '';
        $satkerId = $validated['satuan_kerja_id'];

        $data = VPegawaiData::select('peg_nip', 'peg_nama', 'jabatan_nama', 'unit_kerja_nama')
            ->where('satuan_kerja_id', $satkerId)
            ->where(
                fn($query) => $query->where('peg_nip', $search)
                    ->orWhere('peg_nama', 'ILIKE', "%$search%")
            )
            ->limit(20)
            ->get();

        return response()->json($data);
    }

    public function getTimKerja(TimKerja $timkerja)
    {
        $arrayTim = [];
        $data = TimKerja::select('*')
            ->get();
        foreach ($data as $tim) {

            array_push($arrayTim, (object)[
                'id' => $tim['id'],
                'nama' => $tim['nama'],
                'satuan_kerja_id' => $tim['satuan_kerja_id'],
                'satker_id' => $idskpd,
                'v_struktur_organisasi' => $tim['v_struktur_organisasi'],
                'nip_ketua' => $tim['nip_ketua'],
                'created_at' => $tim['created_at'],
                'updated_at' => $tim['updated_at'],
                'deleted_at' => $tim['deleted_at']
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil get data',
            'data' => $arrayTim,
        ]);
    }
}
