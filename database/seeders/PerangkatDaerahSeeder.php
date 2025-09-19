<?php

namespace Database\Seeders;

use App\Models\SatuanKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerangkatDaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $skpd = [
            [1, 'Badan Perencanaan Pembangunan Daerah Penelitian dan Pengembangan ', 'BAPPEDA'],
            [2, 'Badan Kesatuan Bangsa Dan Politik', 'KESBANGPOL'],
            [3, 'Dinas Kesehatan', 'DINKES'],
            [4, 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana  ', 'DP3AP2KB'],
            [5, 'Satuan Pamong Praja', 'SATPOLPP'],
            [6, 'Dinas Pemberdayaan Masyarakat dan Desa', 'DPMD'],
            [7, 'Dinas Pendidikan dan Kebudayaan', 'DIKBUD'],
            [8, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'BKPSDM'],
            [9, 'Dinas Perpustakaan dan Kearsipan', 'DISPERPUS&SIP'],
            [10, 'Dinas Kependudukan dan Catatan Sipil', 'DISPENCAPIL'],
            [11, 'Dinas Pemuda dan Olahraga', 'DISPORA'],
            [12, 'Dewan Perwakilan Rakyat Daerah Kabupaten Banggai Kepulauan', 'DPRDBANGKEP'],
            [13, 'Dinas Pariwisata', 'DISPAR'],
            [14, 'Dinas Sosial', 'DINSOS'],
            [15, 'RSUD Trikora Salakan', 'RSUDTRIKORA'],
            [16, 'RS Pratama Bilabanggai', 'RSPRATAMA'],
            [17, 'Puskesmas Salakan', 'PUSKESMASSALAKAN'],
            [18, 'Puskesmas Totikum Selatan', 'PUSKESMASTOSEL'],
            [19, 'Puskesmas Lolantang', 'PUSKESMASLOLANTANG'],
            [20, 'Puskesmas Sabang', 'PUSKESMASSABANG'],
            [21, 'Puskesmas Bonepuso', 'PUSKESMASBONEPUSO'],
            [22, 'Puskesmas Bakalan Raya', 'PUSKESMASBAKARA'],
            [23, 'Puskesmas Totikum', 'PUSKESMASTOTIKUM'],
            [24, 'Puskesmas Mansamat', 'PUSKESMASMANSAMAT'],
            [25, 'Puskesmas Tinangkung Utara', 'PUSKESMASTINUT'],
            [26, 'Puskesmas Saleati', 'PUSKESMASSALEATI'],
            [27, 'Puskesmas Patukuki', 'PUSKESMASPATUKUKI'],
            [28, 'Puskesmas Bulagi', 'PUSKESMASBULAGI'],
            [29, 'Puskesmas Tataba', 'PUSKESMASTATABA'],
            [30, 'Puskesmas Lumbi - Lumbia', 'PUSKESMASLUMBILUMBIA'],
            [31, 'Sekretariat Daerah', 'SEKRETARIATDAERAH'],
            [32, 'Bagian Humas', 'HUMAS'],
            [33, 'Bagian Umum', 'UMUM'],
            [34, 'Bagian Hukum', 'HUKUM'],
            [35, 'Bagian Kesra', 'KESRA'],
            [36, 'Bagian BPJ', 'BPJ'],
            [37, 'Bagian Tapem', 'TAPEM'],
            [38, 'Bagian Ortal', 'ORTAL'],
        ];

        foreach ($skpd as $satuan) {
            SatuanKerja::query()->updateOrCreate([
                'satuan_kerja_id' => $satuan[0],
                'satuan_kerja_nama' => $satuan[1],
                'satuan_kerja_nama_alias' => $satuan[2],

            ]);
        }
    }
}
