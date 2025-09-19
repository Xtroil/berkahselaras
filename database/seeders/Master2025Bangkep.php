<?php

namespace Database\Seeders;

use App\Models\IndikatorSasaranStrategis;
use App\Models\IndikatorTujuan;
use App\Models\Kegiatan;
use App\Models\Misi;
use App\Models\Program;
use App\Models\SasaranStrategis;
use App\Models\SubKegiatan;
use App\Models\Tujuan;
use App\Models\Visi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Master2025Bangkep extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $this->visi();
            $this->misi();
            $this->tujuan();
            $this->indikatorTujuan();
            $this->sasaran();
            $this->indikator();
            $this->program();
            $this->kegiatan();
            $this->subKegiatan();
        });
    }

    private function visi()
    {
        Visi::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        Visi::query()->create([
            'tahun_mulai' => 2025,
            'visi' => 'VISI 2025-2029',
        ]);
    }

    private function misi()
    {
        Misi::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $misi = [
            'Misi 1. Memantapkan Tatanan Kehidupan Masyarakat Yang Agamis, Harmonis dan Bermartabat Yang Didukung Nilai-Nilai Budaya Lokal',
            'Misi 2. Meningkatkan Sumber Daya Manusia (SDM) Melalui Pelayanan Pendidikan dan Kesehatan Yang Berkualitas dan Merata',
            'Misi 3. Penguatan Reformasi Birokrasi Melalui Transformasi Digital Untuk Meningkatkan Pelayanan Publik dan Tata Kelola Pemerintahan Yang Efektif',
            'Misi 4. Mewujudkan Kesinambungan Pembangunan dan Pemerataan Infrastruktur Yang Maju dan Berkualitas',
            'Misi 5. Membangun Perekonomian Berbasis Pemberdayaan Masyarakat dan Potensi Unggulan Lokal Berwawasan Lingkungan Yang Berkelanjutan',

        ];
        foreach ($misi as $index => $value) {
            Misi::query()->create([
                'tahun_mulai' => 2025,
                'nomor' =>  $index + 1,
                'misi' => $value,
            ]);
        }
    }

    private function tujuan()
    {
        Tujuan::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $tujuan = [
            'Terwujudnya Kehidupan Masyarakat yang Rukun dengan Menjujung tinggi Nilai- nilai Keagamaan, Budaya, dan Ideologi Pancasila',
            'Meningkatkan Aksesibilitas serta Kualitas Pendidikan dan Kesehatan',
            'Mewujudkan Tata Kelola Pemerintah Yang Bersih, Inovatif dan Kolaboratif',
            'Meningkatkan Kualitas Infrastruktur Dasar dan Konektivitas',
            'Meningkatkan Kesejahteraan Masyarakat Melalui Produktivitas Sektor Unggulan Daerah',
            'Resilensi Terhadap Bencana dan Perubahan Iklim serta Meningkatkan Kualitas Lingkungan Hidup'
        ];
        foreach ($tujuan as $index => $value) {
            Tujuan::query()->create([
                'tahun_mulai' => 2025,
                'nomor' =>  $index + 1,
                'tujuan' => $value,
            ]);
        }
    }

    private function indikatorTujuan()
    {
        IndikatorTujuan::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $indikator = [
            'Indeks Ketentraman dan Ketertiban Umum',
            'Indeks Pembangunan Manusia (IPM)',
            'Indeks Pembangunan Kualitas Keluarga',
            'Indeks Pembangun an Gender',
            'Indeks Pembangunan Literasi Masyarakat',
            'Indeks Reformasi Birokrasi',
            'Indeks Infrastruktur Daerah',
            'Pertumbuhan Ekonomi',
            'Tingkat Kemiskinan',
            'Tingkat Pengangguran Terbuka',
            'Indeks Kualitas Lingkungan Hidup',
            'Indeks Resiko Bencana'
        ];
        foreach ($indikator as $index => $value) {
            IndikatorTujuan::query()->create([
                'tahun_mulai' => 2025,
                'nomor' =>  $index + 1,
                'indikator' => $value,
            ]);
        }
    }

    private function sasaran()
    {
        SasaranStrategis::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $sasaran = [
            'TERWUJUDNYA TATA KELOLA PEMERINTAHAN YANG EFEKTIF & EFISIEN',
        ];

        foreach ($sasaran as $index => $value) {
            SasaranStrategis::query()->create([
                'tahun_mulai' => 2025,
                'nomor' =>  $index + 1,
                'sasaran' => $value,
            ]);
        }
    }

    private function indikator()
    {
        IndikatorSasaranStrategis::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2025]);
        $iku = [
            'INDEKS PELAYANAN PUBLIK',
            'INDEKS SPBE',
            'INDEKS INOVASI DAERAH',
            'INDEKS PERENCANAAN PEMBANGUNAN DAERAH',
        ];

        foreach ($iku as $index => $value) {
            IndikatorSasaranStrategis::query()->create([
                'tahun_mulai' => 2025,
                'nomor' =>  $index + 1,
                'indikator' => $value,
            ]);
        }
    }

    private function program()
    {
        Program::query()
            ->where('tahun_kinerja', 2025)
            ->chunkById(100, function (Collection $data) {
                /** @var Program */
                foreach ($data as $item) {
                    $new = $item->replicate()->fill([
                        'tahun_kinerja' => 2025,
                    ]);

                    Program::query()->create($new->toArray());
                }
            });
    }

    private function kegiatan()
    {
        Kegiatan::query()
            ->where('tahun_kinerja', 2025)
            ->chunkById(100, function (Collection $data) {
                /** @var Kegiatan */
                foreach ($data as $item) {
                    $new = $item->replicate()->fill([
                        'tahun_kinerja' => 2025,
                    ]);

                    Kegiatan::query()->create($new->toArray());
                }
            });
    }

    private function subKegiatan()
    {
        SubKegiatan::query()
            ->where('tahun_kinerja', 2025)
            ->chunkById(100, function (Collection $data) {
                /** @var SubKegiatan */
                foreach ($data as $item) {
                    $new = $item->replicate()->fill([
                        'tahun_kinerja' => 2025,
                    ]);

                    SubKegiatan::query()->create($new->toArray());
                }
            });
    }
}
