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

class Master2024Sulteng extends Seeder
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
        Visi::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2024]);
        Visi::query()->create([
            'tahun_mulai' => 2022,
            'visi' => 'Gerak Cepat Menuju Sulawesi Tengah Lebih Sejahtera dan Lebih Maju',
        ]);
    }

    private function misi()
    {
        Misi::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2024]);
        $misi = [
            'Meningkatkan kualitas manusia provinsi sulawesi tengah melalui reformasi sistem pendidikan dan kesehatan dasar',
            'Mewujudkan reformasi birokrasi, supremasi hukum dan penegakkan nilai-nilau kemanusiaan dan HAM',
            'Mewujudkan peningkatan kesejahteraan masyarakat melalui pemberdayaan ekonomi kerakyatan dan penguatan kelembagaan',
            'Mewujudkan peningkatan pembangunan infrastruktur daerah',
            'Menjalankan pembangunan masyarakat dan wilayah yang merata dan berkeadilan',
            'Menjaga harmonisasi manusia dan alam antar sesama manusia sebagai wujud pembangunan berkelanjutan',
            'Melakukan sinergitas kerjasama pembangunan antar daerah bertetangga sekawasan maupun di dalam provinsi sulawesi tengah dan diluar provinsi bertetangga',
            'Meningkatkan pelayanan publik bidang pendidikan dan kesehatan berbasis pada teknologi informasi yang integrasi dan dijalankansecara sistematis dan digital',
            'Mendorong pembentukaan daerah otonom baru (DOB) agar terjadi percepatan desentralisasi pelayanan dan peningkatan lapangan kerja dan peningkatan produktivitas sektor unggulan daerah'
        ];

        foreach ($misi as $index => $value) {
            Misi::query()->create([
                'tahun_mulai' => 2022,
                'nomor' => $index + 1,
                'misi' => $value,
            ]);
        }
    }

    private function tujuan()
    {
        Tujuan::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2024]);
        $tujuan = [
            'Mewujudkan Peningkatan Kualitas Manusia Provinsi Sulawesi Tengah Melalui Reformasi Sistem Pendidikan Berbasis Vokasi dan Pelayanan Kesehatan dasar yang merata',
            'Mewujudkan Tata Kelola Kepemerintahan yang Baik dan Bersih (GOOD GOVERNANCE AND CLEAN GOVERNMENT)',
            'Meningkatkan Kesejahteraan Masyarakat Melalui Produktivitas Sektor Unggulan Daerah',
            'Menurunkan Kemiskinan',
            'Menurunkan Pengangguran',
            'Meningkatkan Kualitas dan Kuantitas Pembangunan Infrastruktur dan Konektivitas Daerah',
            'Mewujudkan Pembangunan Masyarakat dan Wilayah secara Merata dan Berkeadilan',
            'Mewujudkan Pembangunan Berwawasan Lingkungan dan Berkelanjutan, Serta Tangguh Terhadap Bencana',
            'Mewujudkan Kolaborasi antara Pemerintah Provinsi dan Kabupaten/Kota dan Pihak lainnya dalam Pembagunan Secara Bersinergi dan Terintegrasi',
            'Meningkatkan Kualitas PublikBidang Pendidikan, Kesehatan dan Perpustakaan',
            'Mewujudkan Persiapan Pembentukan daerah Otonomi Baru'
        ];

        foreach ($tujuan as $index => $value) {
            Tujuan::query()->create([
                'tahun_mulai' => 2022,
                'nomor' => $index + 1,
                'tujuan' => $value,
            ]);
        }
    }

    private function indikatorTujuan()
    {
        IndikatorTujuan::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2024]);
        $indikator = [
            'Indeks Pembangunan Manusia (IPM)',
            'Indeks Reformasi Birokrasi',
            'Pertumbuhan Ekonomi',
            'Persentase penduduk miskin',
            'Tingkat Pengangguran Terbuka (TPT)',
            'Indeks Infrastruktur Daerah (IID)',
            'Indeks Williamson',
            'Indeks Pembangunan Gender (IPG)',
            'Indeks Kualitas Lingkungan Hidup (IKLH)',
            'Penurunan Emisi Gas Rumah Kaca',
            'Tingkat efektivitas kerja sama daerah',
            'Indeks Pelayanan Publik',
            'Persentase kajian akademik persiapan DOB yang disampaikan ke Kemendagri RI'
        ];

        foreach ($indikator as $index => $value) {
            IndikatorTujuan::query()->create([
                'tahun_mulai' => 2022,
                'nomor' => $index + 1,
                'indikator' => $value,
            ]);
        }
    }

    private function sasaran()
    {
        SasaranStrategis::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2024]);
        $sasaran = [
            'Meningkatnya akses serta kuantitas dan kualitas Pendidikan',
            'Meningkatnya akses serta kuantitas dan kualitas Kesehatan masyarakat',
            'Meningkatnya konsumsi perkapita',
            'Meningkatnya pelestarian nilai-nilai budaya lokal',
            'Meningkatnya peran pemuda dan daya saing keolahragaan',
            'Terwujudnya tata kelola pemerintahan berkualitas (akuntabel, inovatif, efisien, dan transparan)',
            'Terwujudnya Penegakan Supremasi Hukum dan HAM',
            'Meningkatnya PDRB Sektor Unggulan daerah',
            'Meningkatnya PDRB Sektor Industri Pengolahan',
            'Meningkatnya nilai realisasi investasi',
            'Meningkatnya pendapatan dan daya saing daerah',
            'Menurunnya penduduk miskin perkotaan dan perdesaan',
            'Meningkatnya Penataan Administrasi Pemerintahan, Kerjasama Desa dan Pemberdayaan Lembaga Adat Desa',
            'Meningkatnya kemandirian PMKS',
            'Menurunnya daerah rawan pangan',
            'Meningkatkan angka partisipasi kerja',
            'Meningkatnya kualitas dan kuantitas infrastruktur dasar yang merata dan berkeadilan',
            'Meningkatnya konektivitas jaringan transportasi darat dan laut',
            'Menurunnya tingkat ketimpangan pendapatan',
            'Meningkatnya pemberdayaan perempuan',
            'Terwujudnya keseimbangan pembangunan antar manusia dan lingkungan secara berkelanjutan',
            'Meningkatnya kapasitas ketangguhan terhadap bencana',
            'Meningkatnya kerja sama antar daerah',
            'Terwujudnya pelayanan publik  yang prima',
            'Tersedianya kajian akademik persiapan DOB'
        ];

        foreach ($sasaran as $index => $value) {
            SasaranStrategis::query()->create([
                'tahun_mulai' => 2022,
                'nomor' => $index + 1,
                'sasaran' => $value,
            ]);
        }
    }

    private function indikator()
    {
        IndikatorSasaranStrategis::query()->where('tahun_mulai', 0)->update(['tahun_mulai' => 2024]);
        $iku = [
            'Indeks Pendidikan',
            'Indeks Kesehatan',
            'Pengeluaran Perkapita',
            'Indeks pembangunan kebudayaan (IPK)',
            'Indeks Pembangunan Pemuda',
            'Nilai SAKIP',
            'Kategori indeks Pengelolaan Keuangan Daerah',
            'Status Kinerja LPPD',
            'Indeks Inovasi Daerah',
            'Indeks Sistem Pemerintahan Berbasis Elektronik (SPBE)',
            'Indeks profesionalitas ASN',
            'Indeks Kualitas Kebijakan',
            'Pertumbuhan PDRB Sektor Unggulan daerah',
            'Pertumbuhan PDRB Sektor Industri Pengolahan',
            'Nilai realisasi investasi',
            'PAD terhadap total pendapatan',
            'Indeks Daya Saing Daerah (IDSD)',
            'Persentase penduduk miskin perkotaan',
            'Persentase penduduk miskin perdesaan',
            'Indeks Desa Membangun (IDM)',
            'Presentase PMKS yang mandiri',
            'Presentase penanganan daerah rawan pangan',
            'Rasio Penduduk Bekerja',
            'Indeks Infrastruktur Pekerjaan Umum',
            'Indeks infrastruktur perumahan dan permukiman',
            'Indeks infrastruktur Dasar Perumahan',
            'Persentase Desa Teraliri Listrik',
            'Rasio konektivitas provinsi',
            'Indeks Gini',
            'Inflasi',
            'Indeks Pemberdayaaan Gender (IDG)',
            'Indeks kualitas air (IKA)',
            'Indeks kualitas udara  (IKU)',
            'Indeks kualitas tutupan lahan (IKTL)',
            'Indeks Kualitas Air Laut (IKAL)',
            'Emisi gas rumah kaca',
            'Indeks Ketahanan Daerah dalam Penanggulangan Bencana',
            'MoU (Perjanjian kerja sama)',
            'Indeks kepatuhan terhadap standar pelayanan publik',
            'Indeks Kepuasan Masyarakat (IKM)',
            'Jumlah kajian akademik persiapan DOB'
        ];

        foreach ($iku as $index => $value) {
            IndikatorSasaranStrategis::query()->create([
                'tahun_mulai' => 2022,
                'nomor' => $index + 1,
                'indikator' => $value,
            ]);
        }
    }

    private function program()
    {
        Program::query()
            ->where('tahun_kinerja', 2024)
            ->chunkById(100, function (Collection $data) {
                /** @var Program */
                foreach ($data as $item) {
                    $new = $item->replicate()->fill([
                        'tahun_kinerja' => 2022,
                    ]);

                    Program::query()->create($new->toArray());
                }
            });
    }

    private function kegiatan()
    {
        Kegiatan::query()
            ->where('tahun_kinerja', 2024)
            ->chunkById(100, function (Collection $data) {
                /** @var Kegiatan */
                foreach ($data as $item) {
                    $new = $item->replicate()->fill([
                        'tahun_kinerja' => 2022,
                    ]);

                    Kegiatan::query()->create($new->toArray());
                }
            });
    }

    private function subKegiatan()
    {
        SubKegiatan::query()
            ->where('tahun_kinerja', 2024)
            ->chunkById(100, function (Collection $data) {
                /** @var SubKegiatan */
                foreach ($data as $item) {
                    $new = $item->replicate()->fill([
                        'tahun_kinerja' => 2022,
                    ]);

                    SubKegiatan::query()->create($new->toArray());
                }
            });
    }
}
