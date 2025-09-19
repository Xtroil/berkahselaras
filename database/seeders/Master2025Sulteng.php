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

class Master2025Sulteng extends Seeder
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
            'TRANSFORMASI SUMBER DAYA MANUSIA YANG BERDAYA SAING',
            'TRANSFORMASI PEREKONOMIAN DAERAH YANG INKLUSIF DAN BERKELANJUTAN',
            'TRANSFORMASI TATA KELOLA PEMERINTAHAN YANG BERKUALITAS',
            'KEAMANAN DAERAH TANGGUH, DEMOKRASI SUBSTANSIAL DAN STABILITAS EKONOMI MAKRO DAERAH',
            'KETAHANAN SOSIAL BUDAYA DAN EKOLOGI',
            'PEMBANGUNAN KEWILAYAHAN YANG MERATA DAN BERKEADILAN',
            'SARANA DAN PRASARANA YANG BERKUALITAS DAN RAMAH LINGKUNGAN',
            'KESINAMBUNGAN PEMBANGUNAN'
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
            'TERWUJUDNYA TRANSFORMASI SUMBER DAYA MANUSIA YANG BERDAYA SAING',
            'TERWUJUDNYA TRANSFORMASI PEREKONOMIAN DAERAH YANG INKLUSIF DAN BERKELANJUTAN',
            'TERWUJUDNYA TRANSFORMASI TATA KELOLA PEMERINTAHAN YANG BERKUALITAS',
            'TERWUJUDNYA KEAMANAN DAERAH TANGGUH, DEMOKRASI SUBSTANSIAL DAN STABILITAS EKONOMI MAKRO DAERAH',
            'TERWUJUDNYA KETAHANAN SOSIAL BUDAYA DAN EKOLOGI',
            'TERWUJUDNYA PEMBANGUNAN KEWILAYAHAN YANG MERATA DAN BERKEADILAN',
            'TERWUJUDNYA SARANA DAN PRASARANA YANG BERKUALITAS DAN RAMAH LINGKUNGAN',
            'TERWUJUDNYA KESINAMBUNGAN PEMBANGUNAN'
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
            'INDEKS MODAL MANUSIA',
            'TINGKAT KEMISKINAN (%)',
            'PDRB PERKAPITA (Rp Juta)',
            'RASIO GINI',
            'INDEKS EKONOMI BIRU',
            'KONTRIBUSI PDB INDUSTRI PENGOLAHAN (%)',
            'KONTRIBUSI PDRB PROVINSI (%)',
            'INDEKS REFORMASI BIROKRASI',
            'INDEKS DAYA SAING DAERAH',
            'INDEKS PEMBANGUNAN KUALITAS KELUARGA',
            'PERSENTASE GAS RUMAH KACA (GRK)',
            'INDEKS WILIAMSON',
            'PERSENTASE RUMAH TANGGA HUNIAN LAYAK (%)',
            'INDEKS PERENCANAAN PEMBANGUNAN NASIONAL/DAERAH'
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
            'MENINGKATNYA KESEHATAN UNTUK SEMUA',
            'MENINGKATNYA PENDIDIKAN YANG BERKUALITAS',
            'MENINGKATNYA PERLINDUNGAN SOSIAL YANG ADAPTIF',
            'MENINGKATNYA PEMERATAAN IPTEK, INOVASI, DAN PRODUKTIVITAS EKONOMI',
            'MENINGKATNYA TINGKAT PENERAPAN EKONOMI HIJAU',
            'MENINGKATNYA TRANSFORMASI DIGITAL',
            'MENINGKATNYA INTEGRASI EKONOMI DOMESTIK',
            'MENINGKATNYA PERKOTAAN DAN PEDESAAN SEBAGAI PUSAT PERTUMBUHAN EKONOMI',
            'MENINGKATNYA REGULASI DAN TATA KELOLA YANG BERINTEGRITAS DAN ADAPTIF',
            'MENINGKATNYA HUKUM YANG BERKEADILAN, KEAMANAN PROVINSI YANG TANGGUH, DAN DEMOKRASI YANG SUBSTANSIAL',
            'MENINGKATNYA STABILITAS EKONOMI MAKRO DAERAH',
            'MENINGKATNYA KETANGGUHAN DIPLOMASI DAN BERDAYA GENTAR KAWASAN',
            'MENINGKATNYA MASYARAKAT BERAGAMA MASLAHAT DAN BERKEBUDAYAAN MAJU',
            'MENINGKATNYA KELUARGA BERKUALITAS, KESETARAAN GENDER, DAN MASYARAKAT INKLUSIF',
            'MENINGKATNYA LINGKUNGAN HIDUP BERKUALITAS',
            'MENINGKATNYA DAERAH YANG BERKETAHANAN ENERGI, AIR, DAN MEMILIKI KEMANDIRIAN PANGAN',
            'MENINGKATNYA RESILIENSI TERHADAP BENCANA DAN PERUBAHAN IKLIM',
            'MENINGKATNYA PEMERATAAN PEMBANGUNAN KEWILAYAHAN PERKOTAAN DAN PEDESAAN SEBAGAI PUSAT PERTUMBUHAN EKONOMI',
            'MENINGKATNYA SARANA PRASARANA YANG RAMAH LINGKUNGAN',
            'MENINGKATNYA TATA KELOLA KESINAMBUNGAN PEMBANGUNAN',
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
            'USIA HARAPAN HIDUP (UHH) (TAHUN)',
            'ANGKA KEMATIAN IBU (PER 100.000 KELAHIRAN HIDUP)',
            'PREVALENSI STUNTING (PENDEK DAN SANGAT PENDEK) PADA BALITA (%)',
            'CAKUPAN PENEMUAN DAN PENGOBATAN KASUS TUBERKULOSIS (TREATMENT COVERAGE) (%)',
            'ANGKA KEBERHASILAN PENGOBATAN TUBERKULOSIS (TREATMENT SUCCESS RATE) (%)',
            'PREVELENSI SCHISTOSOMIASIS ',
            'CAKUPAN KEPESERTAAN JAMINAN KESEHATAN PROVINSI (%)',
            'LITERASI MEMBACA (PERSENTASE KABUPATEN/KOTA SATUAN PENDIDIKAN YANG MENCAPAI STANDAR KOMPETENSI MINIMUM PADA ASESMEN TINGKAT NASIONAL)',
            'NUMERASI (PERSENTASE KABUPATEN/KOTA SATUAN PENDIDIKAN YANG MENCAPAI STANDAR KOMPETENSI MINIMUM PADA ASESMEN TINGKAT NASIONAL)',
            'LITERASI MEMBACA (PERSENTASE SATUAN PENDIDIKAN YANG MENCAPAI STANDAR KOMPETENSI MINIMUM PADA ASESMEN TINGKAT NASIONAL)',
            'NUMERASI (PERSENTASE SATUAN PENDIDIKAN YANG MENCAPAI STANDAR KOMPETENSI MINIMUM PADA ASESMEN TINGKAT NASIONAL)',
            'HARAPAN LAMA SEKOLAH',
            'RATA-RATA LAMA SEKOLAH PENDUDUK USIA DI ATAS 15 TAHUN (TAHUN)',
            'ANGKA PARTISIPASI SEKOLAH (APS) SMA SEDERAJAT (%) (PENAMBAHAN DARI TIM RPJPD DISARANKAN DI HAPUSKAN)',
            'PROPORSI PENDUDUK BERUSIA 15 TAHUN KE ATAS YANG BERKUALIFIKASI PENDIDIKAN TINGGI (%) ',
            'PERSENTASE LULUSAN PENDIDIKAN MENENGAH DAN TINGGI YANG BEKERJA DI BIDANG KEAHLIAN MENENGAH TINGGI (%)',
            'ANGKA MELEK HURUF PENDUDUK USIA DIATAS 15 TAHUN (%) ',
            'TINGKAT KEMISKINAN (%)',
            'CAKUPAN KEPESERTAAN JAMINAN SOSIAL KETENAGAKERJAAN (%)',
            'PERSENTASE PENYANDANG DISABILITAS BEKERJA DI SEKTOR FORMAL (%)',
            'RASIO PDRB  SEKTOR INDUSTRI PENGOLAHAN (%)',
            'RASIO PDRB PENYEDIAAN AKOMODASI MAKAN DAN MINUM (%)',
            'JUMLAH TAMU WISATAWAN MANCANEGARA (RIBU ORANG)',
            'PROPORSI PDRB EKONOMI KREATIF (%)',
            'PROPORSI JUMLAH USAHA KECIL DAN MENENGAH NON PERTANIAN PADA LEVEL PROVINSI (%)',
            'PROPORSI JUMLAH INDUSTRI KECIL DAN MENENGAH (%)',
            'RASIO KEWIRAUSAHAAN DAERAH (%)',
            'RASIO VOLUME USAHA KOPERASI TERHADAP PDRB (%)',
            'RETURN ON ASET (ROA) BUMD (%)',
            'TINGKAT PENGANGGURAN TERBUKA (%)',
            'TINGKAT PARTISIPASI ANGKATAN KERJA PEREMPUAN (%)',
            'INDEKS INOVASI DAERAH',
            'INDEKS EKONOMI HIJAU DAERAH',
            'PORSI EBT DALAM BAURAN ENERGI PRIMER (%)',
            'INDEKS PEMBANGUNAN TEKNOLOGI INFORMASI DAN KOMUNIKASI',
            'KOEFISIEN VARIASI HARGA ANTAR WILAYAH TINGKAT PROVINSI',
            'PEMBENTUKAN MODAL TETAP BRUTO (%) PDRB',
            'EKSPOR BARANG DAN JASA (% PDRB)',
            'PROPORSI KONTRIBUSI PDRB TERHADAP PDB NASIONAL (%)',
            'RUMAH TANGGA DENGAN AKSES HUNIAN LAYAK, TERJANGKAU DAN BERKELANJUTAN (%)',
            'PRESENTASE DESA MANDIRI (%)',
            'INDEKS REFORMASI HUKUM',
            'INDEKS SISTEM PEMERINTAHAN BERBASIS ELEKTRONIK',
            'INDEKS PELAYANAN PUBLIK',
            'INDEKS REFORMASI BIROKRASI (IRB)',
            'INDEKS INTEGRITAS NASIONAL',
            'INDEKS KUALITAS KEBIJAKAN',
            'PERSENTASE PENEGAKAN HUKUM PERATURAN DAERAH',
            'PERSENTASE CAPAIAN PELAKSANAAN AKSI HAM',
            'PROPORSI PENDUDUK YANG MERASA AMAN BERJALAN SENDIRIAN DI AREA TEMPAT TINGGALNYA (%)',
            'INDEKS DEMOKRASI INDONESIA',
            'RASIO PAJAK DAERAH TERHADAP PDRB ADHK (%)',
            'TINGKAT INFLASI (%)',
            'TOTAL DANA PIHAK KETIGA/PDRB (%) *',
            'ASET DANA PENSIUN/PDRB (%)',
            'NILAI TRANSAKSI SAHAM PER KAPITA PER PROVINSI (RUPIAH)',
            'TOTAL KREDIT/PDRB (%)',
            'INKLUSI KEUANGAN (%)',
            'INDEKS KEPEMIMPINAN KEPALA DAERAH',
            'INDEKS DAYA SAING DAERAH',
            'INDEKS PEMBANGUNAN  KEBUDAYAAN (IPK)',
            'INDEKS KERUKUNAN UMAT BERAGAMA (IKUB)',
            'INDEKS PEMBANGUNAN KELUARGA (IBANGGA) (SKALA 0-100)',
            'ANGKA KELAHIRAN TOTAL (TOTAL FERTILITY RATE/TFR) PER WUS USIA 15-49 TAHUN (RATA-RATA ANAK PER WANITA',
            'ANGKA PREVALENSI KONTRASEPSI MODERN (MODERN CONTRACEPTIVE PREVALANCE RATE/MCPR) (%)',
            'PERSENTASE KEBUTUHAN BER- KB YANG TIDAK TERPENUHI (UNMET NEED)',
            'ANGKA KELAHIRAN REMAJA UMUR 15-19 TAHUN (AGE SPESIFIC FERTILITY RATE/ASFR) (KELAHIRAN PER 1000 WUS 15-19 TAHUN',
            'INDEKS KETIMPANGAN GENDER (IKG)',
            'INDEKS PENGELOLAAN KEANEKARAGAMAN HAYATI DAERAH',
            'INDEKS KUALITAS LINGKUNGAN HIDUP ',
            'PENGELOLAAN SAMPAH (TIMBULAN SAMPAH TEROLAH DI FASILITAS PENGELOLAAN SAMPAH (%))',
            'KONSUMSI LISTRIK PER KAPITA (KWH)*',
            'INTENSITAS ENERGI PRIMER (SBM/RP MILYAR)*',
            'PREVALENSI KETIDAK CUKUPAN KONSUMSI PANGAN (PREVALENCEF UNDERNOURISHMENT) (%)',
            'KAPASITAS AIR BAKU (M3/DETIK)*',
            'AKSES RUMAH TANGGA PERKOTAAN TERHADAP AIR SIAP MINUM  PERPIPAAN (%)',
            'INDEKS KINERJA SISTEM IRIGASI (IKSI)',
            'PERSENTASE PENURUNAN EMISI GRK (%) (KUMULATIF)',
            'PERSENTASE PENURUNAN EMISI GRK (%) (TAHUNAN)',
            'PERSENTASE KEMANTAPAN JALAN',
            'RASIO KONEKTIVITAS SIMPUL TRANSPORTASI PROVINSI',
            'PERSENTASE LUAS GENANGAN YANG TERTANGANI (%)',
            'RUMAH TANGGA DENGAN AKSES SANITASI AMAN (%)',
            'PENGELOLAAN SAMPAH (PROPORSI RUMAH TANGGA (RT) DENGAN LAYANAN  PENUH PENGUMPULAN SAMPAH (% RT))',
            'PERSENTASE RUMAH TANGGA HUNIAN LAYAK (%)',
            'PERSENTASE PEMBIAYAAN INOVATIF',
            'NILAI MATURITAS SISTEM PENGENDALIAN INTERN PEMERINTAH (SPIP)',
            'INDEKS PERENCANAAN PEMBANGUNAN NASIONAL/DAERAH',
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
